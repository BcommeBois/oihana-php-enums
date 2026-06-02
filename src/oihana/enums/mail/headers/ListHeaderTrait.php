<?php

namespace oihana\enums\mail\headers;

/**
 * Mailing-list header field names (RFC 2369, RFC 2919, RFC 8058).
 *
 * Mixed into {@see \oihana\enums\mail\MailHeader}.
 *
 * @package oihana\enums\mail\headers
 * @author  Marc Alcaraz
 * @since   1.2.0
 */
trait ListHeaderTrait
{
    /**
     * `List-Archive` — URL(s) of the list archive (RFC 2369).
     */
    public const string LIST_ARCHIVE = 'List-Archive' ;

    /**
     * `List-Help` — URL(s) for help about the list (RFC 2369).
     */
    public const string LIST_HELP = 'List-Help' ;

    /**
     * `List-Id` — Stable identifier of the mailing list (RFC 2919).
     */
    public const string LIST_ID = 'List-Id' ;

    /**
     * `List-Owner` — Contact of the list owner (RFC 2369).
     */
    public const string LIST_OWNER = 'List-Owner' ;

    /**
     * `List-Post` — URL(s) / mailto to post to the list (RFC 2369).
     */
    public const string LIST_POST = 'List-Post' ;

    /**
     * `List-Subscribe` — URL(s) / mailto to join the list (RFC 2369).
     */
    public const string LIST_SUBSCRIBE = 'List-Subscribe' ;

    /**
     * `List-Unsubscribe` — URL(s) / mailto to leave the list (RFC 2369).
     */
    public const string LIST_UNSUBSCRIBE = 'List-Unsubscribe' ;

    /**
     * `List-Unsubscribe-Post` — Enables one-click unsubscribe (RFC 8058).
     */
    public const string LIST_UNSUBSCRIBE_POST = 'List-Unsubscribe-Post' ;
}
