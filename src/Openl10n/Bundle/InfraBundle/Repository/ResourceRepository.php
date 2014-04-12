<?php

namespace Openl10n\Bundle\InfraBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Openl10n\Domain\Project\Model\Project;
use Openl10n\Domain\Translation\Model\Resource;
use Openl10n\Bundle\InfraBundle\Entity\Resource as ResourceEntity;
use Openl10n\Domain\Translation\Repository\ResourceRepository as ResourceRepositoryInterface;
use Openl10n\Value\String\Slug;
use Rhumsaa\Uuid\Uuid;

class ResourceRepository extends EntityRepository implements ResourceRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function createNew(Domain $domain, $pattern)
    {
        $uuid = new Uuid('abc');

        return new ResourceEntity($uuid, $domain, $pattern);
    }

    /**
     * {@inheritdoc}
     */
    public function findOneByUuid(Domain $domain, Uuid $uuid)
    {
        return $this->findBy(['domain' => $domain, 'uuid' => $uuid]);
    }

    /**
     * {@inheritdoc}
     */
    public function save(Resource $resource)
    {
        $this->_em->persist($resource);
        $this->_em->flush($resource);
    }

    /**
     * {@inheritdoc}
     */
    public function remove(Resource $resource)
    {
        $this->_em->remove($resource);
        $this->_em->flush($resource);
    }
}
