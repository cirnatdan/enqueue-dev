<?php

namespace Enqueue\Psr;

/**
 * A client uses a MessageConsumer object to receive messages from a destination.
 * A MessageConsumer object is created by passing a Destination object
 * to a message-consumer creation method supplied by a session.
 *
 * @see https://docs.oracle.com/javaee/7/api/javax/jms/MessageConsumer.html
 */
interface Consumer
{
    /**
     * Gets the Queue associated with this queue receiver.
     *
     * @return Queue
     */
    public function getQueue();

    /**
     * Receives the next message that arrives within the specified timeout interval.
     * This call blocks until a message arrives, the timeout expires, or this message consumer is closed.
     * A timeout of zero never expires, and the call blocks indefinitely.
     *
     * @param int $timeout the timeout value (in milliseconds)
     *
     * @return Message|null
     */
    public function receive($timeout = 0);

    /**
     * Receives the next message if one is immediately available.
     *
     * @return Message|null
     */
    public function receiveNoWait();

    /**
     * Tell the MQ broker that the message was processed successfully.
     *
     * @param Message $message
     */
    public function acknowledge(Message $message);

    /**
     * Tell the MQ broker that the message was rejected.
     *
     * @param Message $message
     * @param bool    $requeue
     */
    public function reject(Message $message, $requeue = false);
}
