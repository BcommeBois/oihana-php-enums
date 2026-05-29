<?php

namespace oihana\enums\http;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration of `Content-Disposition` disposition types.
 *
 * The disposition type is the first token of a `Content-Disposition` header
 * value and tells the recipient how the payload should be handled. Parameters
 * such as `filename`, `filename*` or `name` follow the type and are not
 * enumerated here.
 *
 * Example:
 * ```php
 * $value = ContentDisposition::ATTACHMENT . '; filename="report.pdf"' ;
 * $response->withHeader( HttpHeader::CONTENT_DISPOSITION , $value ) ;
 * ```
 *
 * References:
 * - RFC 6266 (Content-Disposition in HTTP): `inline`, `attachment`
 * - RFC 7578 (multipart/form-data): `form-data`
 *
 * @see HttpHeader::CONTENT_DISPOSITION
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
class ContentDisposition
{
    use ConstantsTrait ;

    /**
     * `inline` — Payload should be displayed inline, within the page (RFC 6266).
     */
    public const string INLINE = 'inline' ;

    /**
     * `attachment` — Payload should be downloaded and saved, typically prompting
     * a "Save As" dialog (RFC 6266).
     */
    public const string ATTACHMENT = 'attachment' ;

    /**
     * `form-data` — Part of a `multipart/form-data` body, carrying a form field
     * (RFC 7578).
     */
    public const string FORM_DATA = 'form-data' ;
}
