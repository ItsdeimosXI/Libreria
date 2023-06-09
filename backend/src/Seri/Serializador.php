<?php

namespace Raiz\Seri;

interface Serializador
{
  /** @return mixed[] */
  public function serializar(): array;
  /** @param mixed[] $datos */
  public static function deserializar(array $datos): self;
}