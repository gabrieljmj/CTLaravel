@extends('layout.app')

@section('title', 'Editar')

@section('content')
    <div id="person-data">
      <form id="update-person">
        @if ($person_type === 'fisical')
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="">Nome e sobrenome</span>
            </div>
            <input type="text" id="name" class="form-control" value="{{ $person->name }}" required>
            <input type="text" id="last_name" class="form-control" value="{{ $person->last_name }}" required>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">Nascimento</span>
            </div>
            <input type="date" id="birthday" class="form-control" value="{{ explode(' ', $person->birthday)[0] }}" required>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">CPF</span>
            </div>
            <input type="text" id="cpf" class="form-control" value="{{ $person->cpf }}" maxlength="14" required>
          </div>
        @elseif ($person_type === 'legal')
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">Razão social</span>
            </div>
            <input type="text" id="social_reason" class="form-control" value="{{ $person->social_reason }}" required>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">Nome fantasia</span>
            </div>
            <input type="text" id="fantasy_name" class="form-control" value="{{ $person->fantasy_name }}" required>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon3">CNPJ</span>
            </div>
            <input type="text" id="cnpj" class="form-control" value="{{ $person->cnpj }}" required>
          </div>
        @endif

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">CEP</span>
          </div>
          <input type="text" id="cep" class="form-control" value="{{ $person->cep }}" maxlength="10" required>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">Rua</span>
          </div>
          <input type="text" id="address" class="form-control" value="{{ $person->address }}" required>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">Número</span>
          </div>
          <input type="text" id="number" class="form-control" value="{{ $person->number }}" required>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">Bairro</span>
          </div>
          <input type="text" id="district" class="form-control" value="{{ $person->district }}" required>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">Complemento</span>
          </div>
          <input type="text" id="complement" class="form-control" value="{{ $person->complement }}">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">Cidade</span>
          </div>
          <input type="text" id="city" class="form-control" value="{{ $person->city }}" required>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon3">Estado</span>
          </div>
          {!! Form::select('uf',
            ['AC'=>'Acre','AL'=>'Alagoas','AP'=>'Amapá','AM'=>'Amazonas','BA'=>'Bahia','CE'=>'Ceará','DF'=>'Distrito Federal','ES'=>'Espírito Santo','GO'=>'Goiás','MA'=>'Maranhão','MT'=>'Mato Grosso','MS'=>'Mato Grosso do Sul','MG'=>'Minas Gerais','PA'=>'Pará','PB'=>'Paraíba','PR'=>'Paraná','PE'=>'Pernambuco','PI'=>'Piauí','RJ'=>'Rio de Janeiro','RN'=>'Rio Grande do Norte','RS'=>'Rio Grande do Sul','RO'=>'Rondônia','RR'=>'Roraima','SC'=>'Santa Catarina','SP'=>'São Paulo','SE'=>'Sergipe','TO'=>'Tocantins'],
            $person->uf,
            ['class' => 'form-control', 'id' => 'uf', 'required' => true]
          ) !!}
        </div>

        <div id="messages"></div>

        <div id="form-btns">
          <input type="submit" id="save" value="Salvar" class="btn btn-success">
          <input type="button" id="delete" value="Excluir" class="btn btn-danger">
        </div>
      </form>
    </div>

  <div class="modal" tabindex="-1" role="dialog" id="delete-confirmation-modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tem certeza?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close-delete-confirmation-modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="confirm-delete">Excluir</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel-delete">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" tabindex="-1" role="dialog" id="deleted-modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Excluído!</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close-deleted-modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="exit">Ok</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset('js/functions.js') }}"></script>
  <script>
    window.onload = () => {
      @if ($person_type === 'fisical')
      document.getElementById('cpf').addEventListener('keydown', e => {
        e.target.value = cpfMask(e.target.value);
      });

      @elseif ($person_type === 'legal')
      document.getElementById('cnpj').addEventListener('keydown', e => {
        e.target.value = cnpjMask(e.target.value);
      });
      @endif 

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

      document.getElementById('update-person').onsubmit = e => {
        e.preventDefault();

        let req = { id: {{ $id }} };

        @if ($person_type === 'fisical')
          req.name = document.getElementById('name').value;
          req.last_name = document.getElementById('last_name').value;
          req.birthday = document.getElementById('birthday').value;
          req.cpf = removeMarks(document.getElementById('cpf').value);
        @elseif ($person_type === 'legal')
          req.social_reason = document.getElementById('social_reason').value;
          req.fantasy_name = document.getElementById('fantasy_name').value;
          req.cnpj = removeMarks(document.getElementById('cnpj').value);
        @endif

        req.cep = removeMarks(document.getElementById('cep').value);
        req.address = document.getElementById('address').value;
        req.number = document.getElementById('number').value;
        req.complement = document.getElementById('complement').value;
        req.district = document.getElementById('district').value;
        req.city = document.getElementById('city').value;
        req.uf = document.getElementById('uf').value;

        let headers = new Headers({
          'X-CSRF-TOKEN': document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute('content'),
          'Content-Type': 'application/json'
        });

        let opts = {
          method: 'POST',
          body: JSON.stringify(req),
          headers
        };

        fetch('{{ route('person.api.update') }}', opts)
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
          });
      }

      const setDisplay = (id, display) => {
        document.getElementById(id).style.display = display;
      };

      document.getElementById('delete').onclick = e => {
        setDisplay('delete-confirmation-modal', 'block');
      };

      const closeModal = modal => () => setDisplay(modal, 'none');

      document.getElementById('cancel-delete').onclick
        = document.getElementById('close-delete-confirmation-modal').onclick
        = closeModal('delete-confirmation-modal');

      document.getElementById('exit').onclick = e => {
        window.location = '{{ route('home') }}';
      };

      document.getElementById('confirm-delete').onclick = () => {
        let req = { id: {{ $id }} }

        let headers = new Headers({
          'X-CSRF-TOKEN': document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute('content'),
          'Content-Type': 'application/json'
        });

        let opts = {
          method: 'DELETE',
          body: JSON.stringify(req),
          headers
        };

        fetch('{{ route('person.api.delete') }}', opts)
          .then(res => res.json())
          .then(res => {
            if (res.success) {
              setDisplay('delete-confirmation-modal', 'none');
              setDisplay('deleted-modal', 'block');
            }
          });
      };
    };
  </script>
@endsection