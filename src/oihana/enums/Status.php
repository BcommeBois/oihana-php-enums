<?php

namespace oihana\enums;

use oihana\reflect\traits\ConstantsTrait;

/**
 * Enumeration helper for resource statuses.
 *
 *  Possible statuses:
 *  - anonymized
 *  - archived
 *  - default
 *  - draft
 *  - published
 *  - rejected
 *  - unpublished
 *  - under_review
 *
 * @package oihana\enums
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.0.0
 */
class Status
{
    use ConstantsTrait ;

    /**
     * The resource is anonymized.
     */
    const string ANONYMIZED = 'anonymized' ;

    /**
     * The resource is archived.
     */
    const string ARCHIVED = 'archived' ;

    /**
     * The default status.
     */
    const string DEFAULT = 'default' ;

    /**
     * The resource is a draft.
     */
    const string DRAFT = 'draft' ;

    /**
     * The resource is published.
     */
    const string PUBLISHED = 'published' ;

    /**
     * The resource is rejected.
     */
    const string REJECTED = 'rejected' ;

    /**
     * The resource is under review.
     */
    const string UNDER_REVIEW = 'under_review' ;

    /**
     * The resource is unpublished.
     */
    const string UNPUBLISHED = 'unpublished' ;
}