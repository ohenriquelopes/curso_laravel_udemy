{{ $slot }}
<form action={{ route('site.contato') }} method="post" >
    @csrf
    <input name="nome" value="{{ old('nome') }}" placeholder="Nome" class="{{ $classe }}">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
    <br>
    {{ print_r($motivo_contatos) }}
    <select name="motivo_contato" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1" {{ old('motivo_contato') == 1 ? 'selected' : '' }} >Dúvida</option>
        <option value="2" {{ old('motivo_contato') == 2 ? 'selected' : '' }} >Elogio</option>
        <option value="3" {{ old('motivo_contato') == 3 ? 'selected' : '' }} >Reclamação</option>
    </select>
    <br>
{{--    para fazer o formulario preencher novamente os campos anteriores se der erro no post--}}
        @if(old('mensagem') != '')
           @php $mensagem = old('mensagem'); @endphp
        @else
            @php $mensagem = 'Preencha aqui a sua mensagem'; @endphp
        @endif
    <textarea name="mensagem" class="{{ $classe }}" placeholder="Informe aqui sua mensagem">{{ $mensagem }}</textarea>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

{{--<div style="position: absolute; top:0px; left: 0px; width: 100%; "  >--}}
{{--    <pre>--}}
{{--        {{ print_r($errors) }}--}}
{{--    </pre>--}}
{{--</div>--}}
