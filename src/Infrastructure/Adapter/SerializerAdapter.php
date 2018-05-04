<?php

namespace Infrastructure\Adapter;

use Application\Adapter\SerializerAdapterInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SerializerAdapter implements SerializerAdapterInterface
{
    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct()
    {
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);

        $this->serializer = $serializer;
    }

    /**
     * {@inheritdoc}
     */
    public function deserialize($data, $type, $format, array $context = [])
    {
        return $this->serializer->deserialize($data, $type, $format, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function serialize($data, $format, array $context = [])
    {
        return $this->serializer->serialize($data, $format, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function normalize($data, $format = null, array $context = array())
    {
        return $this->serializer->normalize($data, $format, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $type, $format = null, array $context = array())
    {
        return $this->serializer->denormalize($data, $type, $format, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function encode($data, $format, array $context = [])
    {
        return $this->serializer->encode($data, $format, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function decode($data, $format, array $context = [])
    {
        return $this->serializer->decode($data, $format, $context);
    }
}