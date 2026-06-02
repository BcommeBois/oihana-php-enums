<?php

namespace oihana\enums\mail\headers;

/**
 * MIME header field names (RFC 2045, RFC 2046, RFC 3282).
 *
 * Mixed into {@see \oihana\enums\mail\MailHeader}.
 *
 * @package oihana\enums\mail\headers
 * @author  Marc Alcaraz
 * @since   1.2.0
 *
 * @see \oihana\enums\http\MediaType         For `Content-Type` values.
 * @see \oihana\enums\mail\ContentTransferEncoding For `Content-Transfer-Encoding` values.
 * @see \oihana\enums\http\ContentDisposition For `Content-Disposition` values.
 */
trait MimeHeaderTrait
{
    /**
     * `Content-Description` — Human-readable description of a body part.
     */
    public const string CONTENT_DESCRIPTION = 'Content-Description' ;

    /**
     * `Content-Disposition` — Presentation of a part (`inline` / `attachment`).
     */
    public const string CONTENT_DISPOSITION = 'Content-Disposition' ;

    /**
     * `Content-ID` — Unique identifier of a body part (for `cid:` references).
     */
    public const string CONTENT_ID = 'Content-ID' ;

    /**
     * `Content-Language` — Natural language(s) of the content (RFC 3282).
     */
    public const string CONTENT_LANGUAGE = 'Content-Language' ;

    /**
     * `Content-Location` — URI for the content of a part (RFC 2557).
     */
    public const string CONTENT_LOCATION = 'Content-Location' ;

    /**
     * `Content-Transfer-Encoding` — Encoding applied to the body (`base64`, `quoted-printable`, …).
     */
    public const string CONTENT_TRANSFER_ENCODING = 'Content-Transfer-Encoding' ;

    /**
     * `Content-Type` — Media type of the body / part (e.g. `text/html; charset=utf-8`).
     */
    public const string CONTENT_TYPE = 'Content-Type' ;

    /**
     * `MIME-Version` — Declares the MIME version used (always `1.0`).
     */
    public const string MIME_VERSION = 'MIME-Version' ;
}
