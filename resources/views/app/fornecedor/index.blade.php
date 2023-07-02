<h3>Fornecedor</h3>

@php
    // com o php e endphp, podemos usar o php dentro do blade
/*
if(empty($variavel)) {} // retornar true se a variavel estiver vazia
- ''
- 0
- 0.0
- '0'
- null
- false
- array()
- $var

*/


@endphp



{{--@dd($fornecedores)--}}

{{--@if(count($fornecedores) > 0 && count($fornecedores) < 10)--}}
{{--    <h3>Existem alguns fornecedores cadastrados</h3>--}}
{{--@elseif(count($fornecedores) > 10)--}}
{{--    <h3>Existem vários fornecedores cadastrados</h3>--}}
{{--@else--}}
{{--    <h3>Ainda não existem fornecedores cadastrados</h3>--}}
{{--@endif--}}


{{--Fornecedor: {{ $fornecedores[0]['nome'] }}--}}
{{--<br>--}}
{{--Status: {{ $fornecedores[0]['status'] }}--}}
{{--<br>--}}
{{--@if($fornecedores[0]['status'] == 'N')--}}
{{--    Fornecedor inativo--}}
{{--@endif--}}
{{--<br>--}}
{{--@unless($fornecedores[0]['status'] == 'S')--}}
{{--    Fornecedor inativo--}}
{{--@endunless--}}
{{--<br>--}}

{{--@isset($fornecedores)--}}
{{--    Fornecedor: {{ $fornecedores[0]['nome'] }}--}}
{{--    <br>--}}
{{--    Status: {{ $fornecedores[0]['status'] }}--}}
{{--    <br>--}}
{{--    @isset($fornecedores[0]['cnpj'])--}}
{{--        CNPJ: {{ $fornecedores[0]['cnpj'] }}--}}
{{--        @empty($fornecedores[0]['cnpj'])--}}
{{--            - Vazio--}}
{{--        @endempty--}}
{{--    @endisset--}}
{{--@endisset--}}


{{--@isset($fornecedores)--}}
{{--    @for($i = 0; isset($fornecedores[$i]); $i++)--}}
{{--        Fornecedor: {{ $fornecedores[$i]['nome'] }}--}}
{{--        <br>--}}
{{--        Status: {{ $fornecedores[$i]['status'] }}--}}
{{--        <br>--}}
{{--        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? '' }}--}}
{{--        <br>--}}
{{--        Telefone: ({{ $fornecedores[$i]['ddd'] ?? '' }}) {{ $fornecedores[$i]['telefone'] ?? '' }}--}}
{{--        <hr>--}}
{{--    @endfor--}}
{{--@endisset--}}


{{--@isset($fornecedores)--}}
{{--    @php $i = 0 @endphp--}}
{{--    @while(isset($fornecedores[$i]))--}}
{{--        Fornecedor: {{ $fornecedores[$i]['nome'] }}--}}
{{--        <br>--}}
{{--        Status: {{ $fornecedores[$i]['status'] }}--}}
{{--        <br>--}}
{{--        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? '' }}--}}
{{--        <br>--}}
{{--        Telefone: ({{ $fornecedores[$i]['ddd'] ?? '' }}) {{ $fornecedores[$i]['telefone'] ?? '' }}--}}
{{--        <hr>--}}
{{--        @php $i++ @endphp--}}
{{--    @endwhile--}}
{{--@endisset--}}


{{--@isset($fornecedores)--}}
{{--    @foreach($fornecedores as $indice => $fornecedor)--}}
{{--        Fornecedor: {{ $fornecedor['nome'] }}--}}
{{--        <br>--}}
{{--        Status: {{ $fornecedor['status'] }}--}}
{{--        <br>--}}
{{--        CNPJ: {{ $fornecedor['cnpj'] ?? '' }}--}}
{{--        <br>--}}
{{--        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}--}}
{{--        <hr>--}}
{{--    @endforeach--}}
{{--@endisset--}}

@isset($fornecedores)
    @forelse(@$fornecedores as $indice => $fornecedor)
{{--        @dd($loop)--}}
        Iteracão atual: {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? '' }}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
        <br>
        @if($loop->first)
            Primeira iteração do loop
        @endif
        @if($loop->last)
            Última iteração do loop
            <br>
            Total de registros: {{ $loop->count }}
        @endif
        <hr>
        @empty
        Não existem fornecedores cadastrados
    @endforelse
@endisset
