<?php
// index.php
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Gerador de Currículos</title>
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Gerador de Currículos UniparEAD APO
    </a>
    <div>
      <a class="btn btn-light" href="#">Sobre</a>
    </div>
  </div>
</nav>

<div class="container my-4">
  <h2 class="mb-3">Preencha seus dados — <small class="text-muted">Geração Automática de CV</small></h2>
  <form id="cvForm" action="generate.php" method="post" target="_blank">
    <div class="row">
      <div class="col-md-8">
        <div class="mb-3">
          <label class="form-label">Nome completo</label>
          <input name="name" class="form-control" required>
        </div>

        <div class="mb-3 row">
          <div class="col-md-4">
            <label class="form-label">Data de nascimento</label>
            <input name="dob" id="dob" type="date" class="form-control" required>
          </div>
          <div class="col-md-2">
            <label class="form-label">Idade</label>
            <input id="age" class="form-control" readonly>
          </div>
          <div class="col-md-6">
            <label class="form-label">E-mail</label>
            <input name="email" type="email" class="form-control">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Resumo / Objetivo</label>
          <textarea name="summary" class="form-control" rows="3"></textarea>
        </div>

        <!-- Educação (dinâmico) -->
        <div id="education-section" class="mb-3">
          <label class="form-label">Educação</label>
          <div class="education-item mb-2">
            <input name="education_title[]" class="form-control mb-1" placeholder="Nome da instituição / curso">
            <input name="education_period[]" class="form-control" placeholder="Período (ex: 2019-2022)">
          </div>
        </div>
        <button class="btn btn-sm btn-outline-secondary mb-3" id="add-education" type="button">+ Educação</button>

        <!-- Experiência (dinâmico) -->
        <div id="experience-section" class="mb-3">
          <label class="form-label">Experiência Profissional</label>
          <div class="experience-item mb-2">
            <input name="exp_company[]" class="form-control mb-1" placeholder="Empresa">
            <input name="exp_role[]" class="form-control mb-1" placeholder="Cargo / Função">
            <textarea name="exp_desc[]" class="form-control" rows="2" placeholder="Descrição / responsabilidades"></textarea>
          </div>
        </div>
        <button class="btn btn-sm btn-outline-secondary mb-3" id="add-experience" type="button">+ Experiência</button>

        <!-- Referências (dinâmico) -->
        <div id="references-section" class="mb-3">
          <label class="form-label">Referências</label>
          <div class="ref-item mb-2">
            <input name="ref_name[]" class="form-control mb-1" placeholder="Nome">
            <input name="ref_contact[]" class="form-control" placeholder="Contato (telefone / email)">
          </div>
        </div>
        <button class="btn btn-sm btn-outline-secondary mb-3" id="add-ref" type="button">+ Referência</button>

        <div class="mb-3">
          <label class="form-label">Habilidades (separe por vírgula)</label>
          <input name="skills" class="form-control" placeholder="Ex: PHP, MySQL, HTML, CSS, JS">
        </div>

        <button class="btn btn-success" type="submit">Gerar Currículo</button>
        <button class="btn btn-secondary" type="reset">Limpar</button>
      </div>

      <div class="col-md-4">
        <h5>Preview (não dinâmico)</h5>
        <p class="text-muted">A visualização real aparece na página gerada. Preencha e clique em <b>Gerar Currículo</b>.</p>
        <div class="card">
          <div class="card-body">
            <strong>Dica:</strong>
            <ul>
              <li>Use descrições objetivas nas experiências.</li>
              <li>Adapte o resumo para a vaga desejada.</li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
