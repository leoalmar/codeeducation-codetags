<?php

namespace Leoalmar\CodeTags\Repository;

use Leoalmar\CodeTags\Models\Tag;
use Leoalmar\CodeDatabase\AbstractRepository;

class TagRepository extends AbstractRepository
{
    public function model()
    {
        return Tag::class;
    }
}