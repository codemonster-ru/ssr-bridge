# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

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

[Unreleased]: https://github.com/codemonster-ru/ssr-bridge/compare/v1.0.1...HEAD
[1.0.1]: https://github.com/codemonster-ru/ssr-bridge/compare/v1.0.0...v1.0.1
[1.0.0]: https://github.com/codemonster-ru/ssr-bridge/releases/tag/v1.0.0
