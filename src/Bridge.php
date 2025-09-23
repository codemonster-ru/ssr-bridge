<?php

namespace Codemonster\SsrBridge;

use RuntimeException;

class Bridge
{
    protected string $mode;
    protected ?string $url;
    protected string $ssrScript;

    public function __construct(
        string $mode = 'local',
        ?string $url = null,
        ?string $ssrScript = null
    ) {
        $this->mode = $mode;
        $this->url = $url;
        $this->ssrScript = $ssrScript ?? getcwd() . '/node_modules/ssr-service/dist/ssr.js';
    }

    public function render(string $component, array $props = []): string
    {
        $payload = json_encode([
            'component' => $component,
            'props' => $props,
        ], JSON_UNESCAPED_UNICODE);

        return match ($this->mode) {
            'http' => $this->renderHttp($payload),
            'local' => $this->renderLocal($payload),
            default => throw new RuntimeException("Unknown SSR mode: {$this->mode}")
        };
    }

    protected function renderHttp(string $payload): string
    {
        if (!$this->url) {
            throw new RuntimeException("Bridge in 'http' mode requires a URL");
        }

        $ch = curl_init("{$this->url}/render");

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            throw new RuntimeException("Error requesting SSR server: " . curl_error($ch));
        }

        curl_close($ch);

        return $response;
    }

    protected function renderLocal(string $payload): string
    {
        if (!file_exists($this->ssrScript)) {
            throw new RuntimeException("SSR script not found: {$this->ssrScript}");
        }

        $result = ProcessHelper::run('node', [$this->ssrScript], $payload);

        if ($result['exitCode'] !== 0) {
            throw new RuntimeException("Local SSR failed: " . $result['stderr']);
        }

        return $result['stdout'];
    }
}
