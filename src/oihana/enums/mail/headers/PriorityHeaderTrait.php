<?php

namespace oihana\enums\mail\headers;

/**
 * Priority / importance header field names (RFC 2156, RFC 4021, de-facto).
 *
 * Mixed into {@see \oihana\enums\mail\MailHeader}.
 *
 * @package oihana\enums\mail\headers
 * @author  Marc Alcaraz
 * @since   1.2.0
 *
 * @see \oihana\enums\mail\MailPriority For the values carried by these headers.
 */
trait PriorityHeaderTrait
{
    /**
     * `Importance` — Importance hint (`high` / `normal` / `low`) (RFC 4021).
     */
    public const string IMPORTANCE = 'Importance' ;

    /**
     * `Priority` — Processing priority (`urgent` / `normal` / `non-urgent`) (RFC 2156).
     */
    public const string PRIORITY = 'Priority' ;

    /**
     * `Sensitivity` — Privacy hint (`Personal` / `Private` / `Company-Confidential`) (RFC 2156).
     */
    public const string SENSITIVITY = 'Sensitivity' ;

    /**
     * `X-Priority` — Legacy numeric priority `1` (highest) to `5` (lowest).
     */
    public const string X_PRIORITY = 'X-Priority' ;
}
