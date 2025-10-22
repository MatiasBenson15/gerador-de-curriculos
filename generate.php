<?php
// generate.php
// Recebe POST e monta o currículo
function h($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }

$name = h($_POST['name'] ?? '');
$email = h($_POST['email'] ?? '');
$dob = h($_POST['dob'] ?? '');
$age = '';
if($dob){
  $b = new DateTime($dob);
  $now = new DateTime();
  $age = $now->diff($b)->y;
}
$summary = nl2br(h($_POST['summary'] ?? ''));
$skills = h($_POST['skills'] ?? '');
$education_titles = $_POST['education_title'] ?? [];
$education_periods = $_POST['education_period'] ?? [];
$exp_companies = $_POST['exp_company'] ?? [];
$exp_roles = $_POST['exp_role'] ?? [];
$exp_descs = $_POST['exp_desc'] ?? [];
$ref_names = $_POST['ref_name'] ?? [];
$ref_contacts = $_POST['ref_contact'] ?? [];
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Currículo de <?= $name ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    @media print {
      .no-print { display:none; }
    }
    .cv-container { max-width: 900px; margin: 20px auto; border: 1px solid #ddd; padding: 20px; }
    .left { width: 30%; float:left; padding-right:15px; border-right:1px solid #eee; }
    .right { width: 67%; float:right; padding-left:15px; }
    .section-title { font-weight:700; margin-top:8px; margin-bottom:6px; color:#333; }
    .skill-badge { display:inline-block; margin:2px 4px; padding:4px 8px; border-radius:12px; background:#f1f1f1; font-size:0.85rem; }
    .clear { clear:both; }
  </style>
</head>
<body>
<div class="container cv-container">
  <div class="no-print mb-3">
    <button class="btn btn-primary" onclick="window.print()">Imprimir / Salvar como PDF</button>
    <a class="btn btn-secondary" href="index.php">Voltar</a>
  </div>

  <div class="left">
    <h3><?= $name ?></h3>
    <p><strong>Idade:</strong> <?= $age ?> anos</p>
    <p><strong>E-mail:</strong><br><?= $email ?></p>
    <?php if($skills): ?>
      <div class="mt-3">
        <div class="section-title">Habilidades</div>
        <?php foreach(array_map('trim', explode(',', $skills)) as $s): if($s): ?>
          <span class="skill-badge"><?= h($s) ?></span>
        <?php endif; endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="right">
    <?php if($summary): ?>
      <div class="section-title">Resumo</div>
      <div><?= $summary ?></div>
    <?php endif; ?>

    <?php if(count($exp_companies)): ?>
      <div class="section-title">Experiência Profissional</div>
      <?php for($i=0;$i<count($exp_companies);$i++): 
        $company = h($exp_companies[$i] ?? '');
        $role = h($exp_roles[$i] ?? '');
        $desc = nl2br(h($exp_descs[$i] ?? ''));
        if(!$company && !$role) continue;
      ?>
        <div class="mb-2">
          <strong><?= $role ?> — <?= $company ?></strong>
          <div><?= $desc ?></div>
        </div>
      <?php endfor; ?>
    <?php endif; ?>

    <?php if(count($education_titles)): ?>
      <div class="section-title">Formação</div>
      <?php for($i=0;$i<count($education_titles);$i++):
        $title = h($education_titles[$i] ?? '');
        $period = h($education_periods[$i] ?? '');
        if(!$title) continue;
      ?>
        <div class="mb-1">
          <strong><?= $title ?></strong><br><small><?= $period ?></small>
        </div>
      <?php endfor; ?>
    <?php endif; ?>

    <?php if(count($ref_names)): ?>
      <div class="section-title">Referências</div>
      <?php for($i=0;$i<count($ref_names);$i++):
        $rname = h($ref_names[$i] ?? '');
        $rcontact = h($ref_contacts[$i] ?? '');
        if(!$rname) continue;
      ?>
        <div class="mb-1"><strong><?= $rname ?></strong> — <?= $rcontact ?></div>
      <?php endfor; ?>
    <?php endif; ?>
  </div>

  <div class="clear"></div>
</div>
</body>
</html>
