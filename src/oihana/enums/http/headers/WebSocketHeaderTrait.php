<?php

namespace oihana\enums\http\headers;

/**
 * WebSocket handshake HTTP header names (RFC 6455).
 *
 * Mixed into {@see \oihana\enums\http\HttpHeader}.
 *
 * @package oihana\enums\http\headers
 * @author  Marc Alcaraz (ekameleon)
 * @since   1.1.0
 */
trait WebSocketHeaderTrait
{
    /**
     * `Sec-WebSocket-Accept` — Server's hashed acknowledgement of the handshake key (RFC 6455 §11.3.3).
     */
    public const string SEC_WEBSOCKET_ACCEPT = 'Sec-WebSocket-Accept' ;

    /**
     * `Sec-WebSocket-Extensions` — Extensions negotiated for the connection (RFC 6455 §11.3.2).
     */
    public const string SEC_WEBSOCKET_EXTENSIONS = 'Sec-WebSocket-Extensions' ;

    /**
     * `Sec-WebSocket-Key` — Client's handshake key (RFC 6455 §11.3.1).
     */
    public const string SEC_WEBSOCKET_KEY = 'Sec-WebSocket-Key' ;

    /**
     * `Sec-WebSocket-Protocol` — Subprotocols requested / selected (RFC 6455 §11.3.4).
     */
    public const string SEC_WEBSOCKET_PROTOCOL = 'Sec-WebSocket-Protocol' ;

    /**
     * `Sec-WebSocket-Version` — WebSocket protocol version (RFC 6455 §11.3.5).
     */
    public const string SEC_WEBSOCKET_VERSION = 'Sec-WebSocket-Version' ;
}
