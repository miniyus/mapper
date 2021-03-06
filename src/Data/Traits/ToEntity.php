<?php


namespace Miniyus\Mapper\Data\Traits;

use JsonMapper_Exception;
use Miniyus\Mapper\Data\Contracts\Mapable;
use Miniyus\Mapper\Data\Entity;
use Miniyus\Mapper\Exceptions\DtoErrorException;
use Miniyus\Mapper\Exceptions\EntityErrorException;
use Miniyus\Mapper\Facades\Mapper;
use Miniyus\Mapper\MapperFactory;
use Throwable;

trait ToEntity
{
    /**
     * 콜백이 있는 경우, 매핑 처리 로직이 콜백함수 내부의 로직으로 대체됩니다.
     * callback 규칙: function({매핑 데이터}, {매핑 객체})
     * @param string|null $entity
     * @param callable|Closure|string|null $callback
     * @return Entity|Mapable|null
     * @throws JsonMapper_Exception
     * @throws DtoErrorException
     * @throws EntityErrorException
     */
    public function toEntity(?string $entity = null, $callback = null): ?Entity
    {
        try {
            return Mapper::map($this, $entity, $callback);
        } catch (Throwable $e) {
            return MapperFactory::make()->map($this, $entity, $callback);
        }
    }
}
