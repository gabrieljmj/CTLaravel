@extends('layout.app')

@section('title', 'Cadastrar pessoa')

@section('content')
  <div id="create-person">
    <div class="form-group">
    <label for="person-type">Pessoa</label>
    <select id="person-type" class="form-control">
      <option value="fisical">Física</option>
      <option value="legal">Jurídica</option>
    </select>
    </div>

    <form id="create-form" name="create-form">
    <div id="fisical-person-data" class="person-data-type">
      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="">Nome e sobrenome *</span>
      </div>
      <input type="text" id="name" class="form-control" required>
      <input type="text" id="last_name" class="form-control" required>
      </div>

      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">Nascimento *</span>
      </div>
      <input type="date" id="birthday" class="form-control" required>
      </div>

      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">CPF *</span>
      </div>
      <input type="text" id="cpf" class="form-control" maxlength="14" required>
      </div>
    </div>

    <div id="legal-person-data" class="person-data-type" style="display: none">
      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">Razão social *</span>
      </div>
      <input type="text" id="social_reason" class="form-control" required>
      </div>

      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">Nome fantasia *</span>
      </div>
      <input type="text" id="fantasy_name" class="form-control" required>
      </div>

      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">CNPJ *</span>
      </div>
      <input type="text" id="cnpj" class="form-control" required>
      </div>
    </div>

    <div id="common-fields">
      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">CEP *</span>
      </div>
      <input type="text" id="cep" class="form-control" maxlength="10" required>
      </div>

      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">Rua *</span>
      </div>
      <input type="text" id="address" class="form-control" required>
      </div>

      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">Número *</span>
      </div>
      <input type="text" id="number" class="form-control" required>
      </div>

      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">Bairro *</span>
      </div>
      <input type="text" id="district" class="form-control" required>
      </div>

      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">Complemento</span>
      </div>
      <input type="text" id="complement" class="form-control">
      </div>

      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">Cidade *</span>
      </div>
      <input type="text" id="city" class="form-control" required>
      </div>

      <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon3">Estado</span>
      </div>
      <select id="uf" class="form-control" required>
        <option value="AC">Acre</option>
        <option value="AL">Alagoas</option>
        <option value="AP">Amapá</option>
        <option value="AM">Amazonas</option>
        <option value="BA">Bahia</option>
        <option value="CE">Ceará</option>
        <option value="DF">Distrito Federal</option>
        <option value="ES">Espírito Santo</option>
        <option value="GO">Goiás</option>
        <option value="MA">Maranhão</option>
        <option value="MT">Mato Grosso</option>
        <option value="MS">Mato Grosso do Sul</option>
        <option value="MG">Minas Gerais</option>
        <option value="PA">Pará</option>
        <option value="PB">Paraíba</option>
        <option value="PR">Paraná</option>
        <option value="PE">Pernambuco</option>
        <option value="PI">Piauí</option>
        <option value="RJ">Rio de Janeiro</option>
        <option value="RN">Rio Grande do Norte</option>
        <option value="RS">Rio Grande do Sul</option>
        <option value="RO">Rondônia</option>
        <option value="RR">Roraima</option>
        <option value="SC">Santa Catarina</option>
        <option value="SP">São Paulo</option>
        <option value="SE">Sergipe</option>
        <option value="TO">Tocantins</option>
      </select>
      </div>
    </div>

    <div style="margin-bottom: 10px;">(*) Campos obrigatórios</div>

    <div id="messages"></div>

    <input type="submit" id="create" class="btn btn-success" value="Criar">
    </form>
  </div>
@endsection

@section('scripts')
  <script>
    window.onload = () => {
      let personType = 'fisical';

      const requireFields = from => {
      let fisicalFieldsRequired = from === 'fisical' ? true : false;
      let legalFieldsRequired = !fisicalFieldsRequired;

      document.getElementById('name').setAttribute('required', fisicalFieldsRequired);
      document.getElementById('last_name').setAttribute('required', fisicalFieldsRequired);
      document.getElementById('birthday').setAttribute('required', fisicalFieldsRequired);
      document.getElementById('cpf').setAttribute('required', fisicalFieldsRequired);

      document.getElementById('social_reason').setAttribute('required', legalFieldsRequired);
      document.getElementById('fantasy_name').setAttribute('required', legalFieldsRequired);
      document.getElementById('cnpj').setAttribute('required', legalFieldsRequired);
      }

      document.getElementById('person-type')
      .addEventListener('change', e => {
        personType = e.target.value;

        document.getElementById('create-form').reset();

        if (personType == 'fisical') {
        document.getElementById('fisical-person-data').style.display = '';
        document.getElementById('legal-person-data').style.display = 'none';

        requireFields('fisical');
        } else {
        document.getElementById('legal-person-data').style.display = '';
        document.getElementById('fisical-person-data').style.display = 'none';

        requireFields('legal');
        }
      });

      document.getElementById('cpf').addEventListener('keydown', e => {
      e.target.value = cpfMask(e.target.value);
      });

      document.getElementById('cnpj').addEventListener('keydown', e => {
      e.target.value = cnpjMask(e.target.value);
      });

      document.getElementById('cep').addEventListener('keyup', e => {
      let target = e.target;
      target.value = cepMask(target.value);
      let cep = e.target.value
        .replace('.', '')
        .replace('-', '');

      if (isCep(target.value)) {
        target.disabled = true;

        fetch('http://viacep.com.br/ws/' + cep + '/json/')
        .then(res => res.json())
        .then(res => {
          target.disabled = false;
          
          document.getElementById('address').value = res.logradouro;
          document.getElementById('complement').value = res.complemento;
          document.getElementById('district').value = res.bairro;
          document.getElementById('city').value = res.localidade;
          document.getElementById('uf').value = res.uf;
        })
        .catch(e => {
          throw new Error(e);
        });
      }
      });

      document.getElementById('create').onclick = e => {
      e.preventDefault();

      let personData = {person_type: document.getElementById('person-type').value};

      if (personType === 'fisical') {
        personData.name = document.getElementById('name').value;
        personData.last_name = document.getElementById('last_name').value;
        personData.birthday = document.getElementById('birthday').value;
        personData.cpf = removeMarks(document.getElementById('cpf').value);
      } else if (personType === 'legal') {
        personData.social_reason = document.getElementById('social_reason').value;
        personData.fantasy_name = document.getElementById('fantasy_name').value;
        personData.cnpj = removeMarks(document.getElementById('cnpj').value);
      }

      personData.cep = removeMarks(document.getElementById('cep').value);
      personData.address = document.getElementById('address').value;
      personData.number = document.getElementById('number').value;
      personData.complement = document.getElementById('complement').value;
      personData.district = document.getElementById('district').value;
      personData.city = document.getElementById('city').value;
      personData.uf = document.getElementById('uf').value;

      let headers = new Headers({
        'X-CSRF-TOKEN': document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content'),
        'Content-Type': 'application/json'
      });

      let opts = {
        method: 'PUT',
        body: JSON.stringify(personData),
        headers
      };

      fetch('{{ route('person.api.create') }}', opts)
        .then(res => res.json())
        .then(res => {
          if (res.success) {
            document.getElementById('messages').innerHTML = `
            <div class="alert alert-success" role="alert">
              Salvo com sucesso!
            </div>
            `;
          } else {
            document.getElementById('messages').innerHTML = `
            <div class="alert alert-danger" role="alert">
              ${res.message}
            </div>
            `;
          }
        })
        .catch(e => console.log(e));
      }
    };
  </script>
  <script src="{{ asset('js/functions.js') }}"></script>
@endsection