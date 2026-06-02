<?php

namespace oihana\enums\mail;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Values of the `Sensitivity` header field (RFC 2156, X.400).
 *
 * A privacy hint set by the author; receiving clients may restrict
 * forwarding, replying or printing accordingly. Absence of the header means
 * no special sensitivity.
 *
 * @package oihana\enums\mail
 * @author  Marc Alcaraz
 * @since   1.2.0
 *
 * @see MailHeader::SENSITIVITY
 */
class Sensitivity
{
    use ConstantsTrait ;

    /**
     * `Company-Confidential` — Restricted to the originator's organization.
     */
    public const string COMPANY_CONFIDENTIAL = 'Company-Confidential' ;

    /**
     * `Personal` — Personal message; handle with discretion.
     */
    public const string PERSONAL = 'Personal' ;

    /**
     * `Private` — Private message intended only for the recipient.
     */
    public const string PRIVATE = 'Private' ;
}
