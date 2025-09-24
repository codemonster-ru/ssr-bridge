# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.0.3] - 2025-09-25

### Added

-   Automatic default value substitution in the constructor (`transport`, `mode`, `script`, `cwd`, ​​`url`, etc.).
-   Support for the `--cli-mode` flag for CLI SSR launch (prevents freezes in dev mode).
-   Flexible control over preload flags (`disable_preload`, `disable_js_preload`, `disable_css_preload`, `disable_font_preload`, `disable_image_preload`).

### Changed

-   Local rendering always uses the user project's `cwd` (by default, `getcwd()`).
-   The CLI config and arguments have become consistent: all values ​​are passed strictly via flags.
-   Improved error message if the SSR script is not found.

## [1.0.2] - 2025-09-24

### Changed

-   Namespace changed from `Codemonster\SsrBridge\ProcessHelper` to `Codemonster\Ssr\ProcessHelper`.

## [1.0.1] - 2025-09-24

### Changed

-   Namespace changed from `Codemonster\SsrBridge` to `Codemonster\Ssr`.

## [1.0.0] - 2025-09-23

### Added

-   Initial stable release of **codemonster-ru/ssr-bridge**.
-   `Bridge` class with support for:
    -   **Local SSR**: run Node.js SSR script via `proc_open`.
    -   **HTTP SSR**: send JSON payload to remote Node.js SSR server.
-   `ProcessHelper` utility for safe command execution.
-   PHPUnit tests with `unknownModeThrows` check.
-   GitHub Actions workflow for CI (`.github/workflows/tests.yml`).
-   Documentation (`README.md`) with installation and usage examples.
-   Packagist metadata: keywords (PHP, SSR, Vue, React, Svelte, Solid, Laravel, Symfony, Annabel, etc.).

---

[Unreleased]: https://github.com/codemonster-ru/ssr-bridge/compare/v1.0.2...HEAD
[1.0.2]: https://github.com/codemonster-ru/ssr-bridge/compare/v1.0.1...v1.0.2
[1.0.1]: https://github.com/codemonster-ru/ssr-bridge/compare/v1.0.0...v1.0.1
[1.0.0]: https://github.com/codemonster-ru/ssr-bridge/releases/tag/v1.0.0
