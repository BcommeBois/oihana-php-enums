<?php

namespace oihana\enums\http\headers;

/**
 * User-Agent Client Hints HTTP header names.
 *
 * The `Sec-CH-UA-*` request headers expose user-agent details, replacing
 * fine-grained parsing of `User-Agent`.
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait ClientHintHeaderTrait
{
    /**
     * `Sec-CH-UA` — User agent's branding and significant version (low entropy).
     */
    public const string SEC_CH_UA = 'Sec-CH-UA' ;

    /**
     * `Sec-CH-UA-Arch` — Underlying CPU architecture (e.g. `x86`, `arm`).
     */
    public const string SEC_CH_UA_ARCH = 'Sec-CH-UA-Arch' ;

    /**
     * `Sec-CH-UA-Bitness` — CPU bitness (e.g. `64`).
     */
    public const string SEC_CH_UA_BITNESS = 'Sec-CH-UA-Bitness' ;

    /**
     * `Sec-CH-UA-Full-Version-List` — Full version of each brand in the user agent.
     */
    public const string SEC_CH_UA_FULL_VERSION_LIST = 'Sec-CH-UA-Full-Version-List' ;

    /**
     * `Sec-CH-UA-Mobile` — Whether the user agent runs on a mobile device (`?0` / `?1`).
     */
    public const string SEC_CH_UA_MOBILE = 'Sec-CH-UA-Mobile' ;

    /**
     * `Sec-CH-UA-Model` — Device model identifier.
     */
    public const string SEC_CH_UA_MODEL = 'Sec-CH-UA-Model' ;

    /**
     * `Sec-CH-UA-Platform` — Operating system / platform (e.g. `Windows`, `Android`).
     */
    public const string SEC_CH_UA_PLATFORM = 'Sec-CH-UA-Platform' ;

    /**
     * `Sec-CH-UA-Platform-Version` — Version of the operating system / platform.
     */
    public const string SEC_CH_UA_PLATFORM_VERSION = 'Sec-CH-UA-Platform-Version' ;
}
