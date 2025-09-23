<?php

namespace Codemonster\Ssr;

class ProcessHelper
{
    public static function run(string $command, array $args = [], ?string $input = null): array
    {
        $cmd = escapeshellcmd($command) . ' ' . implode(' ', array_map('escapeshellarg', $args));

        $descriptors = [
            0 => ['pipe', 'r'],
            1 => ['pipe', 'w'],
            2 => ['pipe', 'w'],
        ];

        $process = proc_open($cmd, $descriptors, $pipes);

        if (!is_resource($process)) {
            return ['exitCode' => 1, 'stdout' => '', 'stderr' => 'Failed to start process'];
        }

        if ($input !== null) {
            fwrite($pipes[0], $input);
        }
        fclose($pipes[0]);

        $stdout = stream_get_contents($pipes[1]);
        fclose($pipes[1]);

        $stderr = stream_get_contents($pipes[2]);
        fclose($pipes[2]);

        $exitCode = proc_close($process);

        return compact('exitCode', 'stdout', 'stderr');
    }
}
