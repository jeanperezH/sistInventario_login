@extends('principal')
@section('contenido')
  <template v-if="menu==0">
    <Producto :ruta="ruta"></Producto>
  </template>
  <template v-if="menu==1">
    <Entrada :ruta="ruta"></Entrada>
  </template>
  <template v-if="menu==2">
    <Salida :ruta="ruta"></Salida>
  </template>
  <template v-if="menu==3">
    <User :ruta="ruta"></User>
  </template>
@endsection