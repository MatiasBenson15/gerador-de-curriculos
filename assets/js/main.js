// assets/js/main.js
$(document).ready(function(){
  function calcAge(dob){
    if(!dob) return '';
    const birth = new Date(dob);
    const today = new Date();
    let age = today.getFullYear() - birth.getFullYear();
    const m = today.getMonth() - birth.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birth.getDate())) age--;
    return age;
  }

  $('#dob').on('change', function(){
    $('#age').val(calcAge(this.value));
  });

  // adicionar educação
  $('#add-education').click(function(){
    const html = `<div class="education-item mb-2">
      <input name="education_title[]" class="form-control mb-1" placeholder="Nome da instituição / curso">
      <input name="education_period[]" class="form-control mb-1" placeholder="Período (ex: 2019-2022)">
      <button type="button" class="btn btn-sm btn-danger remove-item">Remover</button>
    </div>`;
    $('#education-section').append(html);
  });

  // adicionar experiência
  $('#add-experience').click(function(){
    const html = `<div class="experience-item mb-2">
      <input name="exp_company[]" class="form-control mb-1" placeholder="Empresa">
      <input name="exp_role[]" class="form-control mb-1" placeholder="Cargo / Função">
      <textarea name="exp_desc[]" class="form-control mb-1" rows="2" placeholder="Descrição / responsabilidades"></textarea>
      <button type="button" class="btn btn-sm btn-danger remove-item">Remover</button>
    </div>`;
    $('#experience-section').append(html);
  });

  // adicionar referência
  $('#add-ref').click(function(){
    const html = `<div class="ref-item mb-2">
      <input name="ref_name[]" class="form-control mb-1" placeholder="Nome">
      <input name="ref_contact[]" class="form-control mb-1" placeholder="Contato (telefone / email)">
      <button type="button" class="btn btn-sm btn-danger remove-item">Remover</button>
    </div>`;
    $('#references-section').append(html);
  });

  // remover dinamicamente
  $(document).on('click', '.remove-item', function(){
    $(this).closest('div').remove();
  });
});
