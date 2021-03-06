<?php


namespace CorreosSdk\Factories;


use CorreosSdk\StructType\DIRECCIONTYPE;

class Shipment
{
    /**
     * @var string
     */
    private $trackNumber;

    /**
     * @var string
     */
    private $clippedTrackNumber;

    /**
     * @var \DateTime
     */
    private $dateRequest;

    /**
     * @var ReceiverUnitedIdentity
     */
    private $receiverUnitedIdentity;

    /**
     * @var SendingContent
     */
    private $sendingContent;

    /**
     * @var object
     */
    private $response;
    /**
     * @var SenderUnitedIdentity|null
     */
    private $senderUnitedIdentity;

    /**
     * Shipment constructor.
     * @param ReceiverUnitedIdentity $receiverUnitedIdentity
     * @param SendingContent $sendingContent
     * @param SenderUnitedIdentity|null $senderUnitedIdentity
     */
    public function __construct(ReceiverUnitedIdentity $receiverUnitedIdentity, SendingContent $sendingContent, SenderUnitedIdentity $senderUnitedIdentity = null)
    {
        $this->receiverUnitedIdentity = $receiverUnitedIdentity;
        $this->sendingContent = $sendingContent;
        $this->senderUnitedIdentity = $senderUnitedIdentity;
    }

    /**
     * @return ReceiverUnitedIdentity
     */
    public function getReceiverUnitedIdentity(): ReceiverUnitedIdentity
    {
        return $this->receiverUnitedIdentity;
    }

    /**
     * @return SendingContent
     */
    public function getSendingContent(): SendingContent
    {
        return $this->sendingContent;
    }

    /**
     * @return string
     */
    public function getTrackNumber(): string
    {
        return $this->trackNumber;
    }

    /**
     * @param string $trackNumber
     */
    public function setTrackNumber(string $trackNumber): void
    {
        $this->trackNumber = $trackNumber;
    }

    /**
     * @return object
     */
    public function getResponse(): object
    {
        return $this->response;
    }

    /**
     * @param object $response
     */
    public function setResponse($response): void
    {
        $this->response = $response;
    }

    /**
     * @return \DateTime
     */
    public function getDateRequest(): \DateTime
    {
        return $this->dateRequest;
    }

    /**
     * @param \DateTime $dateRequest
     */
    public function setDateRequest(\DateTime $dateRequest): void
    {
        $preparedDateTime = $this->setZerosToSeconds($dateRequest);

        $this->dateRequest = $dateRequest;
    }

    /**
     * @param \DateTime $dateTime
     * @return \DateTime
     */
    private function setZerosToSeconds(\DateTime $dateTime) : \DateTime
    {
        $hours = $dateTime->format('H');
        $minutes = $dateTime->format('i');
        $preparedDateTime = $dateTime->setTime(intval($hours), intval($minutes), 0);

        return $preparedDateTime;
    }

    /**
     * For printing labels need cut last character
     * @return string
     */
    public function getClippedTrackNumber(): ?string
    {
        return substr($this->trackNumber, 0, -1);
    }

    /**
     * @return SenderUnitedIdentity|null
     */
    public function getSenderUnitedIdentity(): ?SenderUnitedIdentity
    {
        return $this->senderUnitedIdentity;
    }

    /**
     * @param SenderUnitedIdentity|null $senderUnitedIdentity
     */
    public function setSenderUnitedIdentity(?SenderUnitedIdentity $senderUnitedIdentity): void
    {
        $this->senderUnitedIdentity = $senderUnitedIdentity;
    }
}