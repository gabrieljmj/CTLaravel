@extends('layout.app')

@section('title', 'Lista de pessoas')

@section('content')
  <div id="people-type-selector-div">
      <label for="people-type-selector">Pessoa</label>
      <select id="people-type-selector" class="form-control">
        <option value="fisical">Física</option>
        <option value="legal">Jurídica</option>
      </select>
    </div>
    <div id="people-list">
    <table class="table" id="fisical-people-table">
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Sobrenome</th>
          <th scope="col">Nascimento</th>
          <th scope="col">CPF</th>
          <th scope="col">CEP</th>
          <th scope="col">Rua</th>
          <th scope="col">Número</th>
          <th scope="col">Bairro</th>
          <th scope="col">Complemento</th>
          <th scope="col">Cidade</th>
          <th scope="col">Estado</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($fisicalPeople as $person)
          <tr>
            <td>{{ $person->name }}</td>
            <td>{{ $person->last_name }}</td>
            <td>{{ (new \DateTime($person->birthday))->format('d/m/Y') }}</td>
            <td>{{ $person->cpf }}</td>
            <td>{{ $person->cep }}</td>
            <td>{{ $person->address }}</td>
            <td>{{ $person->number }}</td>
            <td>{{ $person->district }}</td>
            <td>{{ $person->complement }}</td>
            <td>{{ $person->city }}</td>
            <td>{{ $person->uf }}</td>
            <td><a href="{{ route('person.update', ['id' => $person->person_id]) }}" class="btn btn-primary">Editar</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <table class="table" id="legal-people-table" style="display: none">
      <thead>
        <tr>
          <th scope="col">Razão Social</th>
          <th scope="col">Nome Fantasia</th>
          <th scope="col">CNPJ</th>
          <th scope="col">CEP</th>
          <th scope="col">Rua</th>
          <th scope="col">Número</th>
          <th scope="col">Bairro</th>
          <th scope="col">Complemento</th>
          <th scope="col">Cidade</th>
          <th scope="col">Estado</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($legalPeople as $person)
          <tr>
            <td>{{ $person->social_reason }}</td>
            <td>{{ $person->fantasy_name }}</td>
            <td>{{ $person->cnpj }}</td>
            <td>{{ $person->cep }}</td>
            <td>{{ $person->address }}</td>
            <td>{{ $person->number }}</td>
            <td>{{ $person->district }}</td>
            <td>{{ $person->complement }}</td>
            <td>{{ $person->city }}</td>
            <td>{{ $person->uf }}</td>
            <td><a href="{{ route('person.update', ['id' => $person->person_id]) }}" class="btn btn-primary">Editar</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection

@section('scripts')
  <script>
    window.onload = () => {
      document.getElementById('people-type-selector').onchange = e => {
        let type = e.target.value;

        if (type === 'fisical') {
          document.getElementById('fisical-people-table').style.display = '';
          document.getElementById('legal-people-table').style.display = 'none';
        } else if (type === 'legal') {
          document.getElementById('fisical-people-table').style.display = 'none';
          document.getElementById('legal-people-table').style.display = '';
        }
      };
    }
  </script>
@endsection