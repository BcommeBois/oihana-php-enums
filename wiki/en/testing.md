# Tests & coverage

## Running the suite

```bash
composer test            # run the unit suite (PHPUnit, strict mode)
```

Run a single test case:

```bash
./vendor/bin/phpunit --filter HttpStatusCodeTest
```

The suite runs in **strict mode** (`phpunit.xml`): warnings, risky tests (no assertion), skipped tests and output during tests all **fail** the run. A test that checks nothing protects nothing.

## Measuring coverage

Requires **Xdebug** or **PCOV**:

```bash
composer coverage        # text + Clover + HTML under build/coverage/
composer coverage:md     # readable Markdown summary (build/coverage/COVERAGE.md)
```

`composer coverage:md` runs the suite, then renders `build/coverage/COVERAGE.md` (global %, a by-directory table sorted worst-first, the least-covered files, and the 0% list). It also keeps a small local trend log (`build/coverage/history.json`) so each run shows the delta since the previous one. Coverage output lives under `build/` and is **gitignored** — it is a snapshot that goes stale at the next commit, so it is regenerated on demand rather than committed.

The suite covers **100% of lines** (323/323) and **100% of methods** (52/52), across **320 tests**.

## Testing philosophy

- Coverage measures which lines **ran**, not which behaviours are **verified** — 100% coverage is not zero bugs.
- When you discover a surprising behaviour in existing code, **freeze it in a test** first. Don't change a public API's behaviour without discussing it: other libraries may rely on it.
- **Test everything reachable.** Prefer making a guard reachable (e.g. by injecting a seam) over annotating it. Only annotate a line `@codeCoverageIgnore` when it is genuinely impossible to reach from the public surface.

## The one annotated guard

A single defensive guard in the whole library carries `@codeCoverageIgnore`: the *headers-already-sent* branch of `HttpHeader::send()`. It is **unreachable under PHPUnit**, whose output buffering keeps `headers_sent()` false for the duration of a test — and PHP's own `header()` call below would already emit the same warning. Every other guard is exercised by a real test (for example, `HashAlgorithm::ensureAvailable()` accepts an injectable algorithm list precisely so its runtime-availability throw can be tested).

## See also

- [Introduction](getting-started/introduction.md) — the library's design goals.
- [Tips and pitfalls](tips.md) — gotchas worth a regression test.
- [English TOC](README.md).
