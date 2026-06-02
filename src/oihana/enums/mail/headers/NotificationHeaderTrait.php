<?php

namespace oihana\enums\mail\headers;

/**
 * Delivery / disposition notification header field names
 * (RFC 3461 DSN, RFC 8098 MDN).
 *
 * Mixed into {@see \oihana\enums\mail\MailHeader}.
 *
 * @package oihana\enums\mail\headers
 * @author  Marc Alcaraz
 * @since   1.2.0
 */
trait NotificationHeaderTrait
{
    /**
     * `Disposition-Notification-Options` — Parameters governing the requested MDN (RFC 8098).
     */
    public const string DISPOSITION_NOTIFICATION_OPTIONS = 'Disposition-Notification-Options' ;

    /**
     * `Disposition-Notification-To` — Requests a read receipt (MDN) to this address (RFC 8098).
     */
    public const string DISPOSITION_NOTIFICATION_TO = 'Disposition-Notification-To' ;

    /**
     * `Original-Message-ID` — Message-ID of the message a notification refers to.
     */
    public const string ORIGINAL_MESSAGE_ID = 'Original-Message-ID' ;

    /**
     * `Return-Receipt-To` — Legacy, non-standard read-receipt request.
     */
    public const string RETURN_RECEIPT_TO = 'Return-Receipt-To' ;
}
