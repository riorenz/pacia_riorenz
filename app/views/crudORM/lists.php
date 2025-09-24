<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Students List</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark">

<div class="container py-5">

  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h4 fw-semibold">Students</h1>
    <a href="<?= site_url('students/create'); ?>" class="btn btn-primary d-flex align-items-center gap-2">
      ➕ Add Student
    </a>
  </div>

  <!-- Search + Filter -->
  <form method="get" class="row g-3 align-items-center mb-4">
    <?php
      $q = isset($query) ? $query : '';
      $cur_page = isset($page) ? (int)$page : 1;
      $cur_per = isset($per_page) ? (int)$per_page : 3;
      $total_items = isset($total_items) ? (int)$total_items : 0;
      $total_pages = isset($total_pages) ? (int)$total_pages : 1;
    ?>

    <div class="col-md-8 d-flex gap-2">
      <input type="search" name="q" value="<?= htmlspecialchars($q, ENT_QUOTES); ?>"
             class="form-control" placeholder="Search firstname, lastname or email">
      <select name="per_page" onchange="this.form.submit()" class="form-select w-auto">
        <?php foreach ([3,6,9] as $opt): ?>
          <option value="<?= $opt; ?>" <?= $cur_per === $opt ? 'selected' : ''; ?>><?= $opt; ?> / page</option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="col-md-4 d-flex justify-content-end gap-2">
      <button type="submit" class="btn btn-outline-secondary">Search</button>
      <a href="<?= site_url('students/get-all'); ?>" class="btn btn-outline-secondary">Reset</a>
    </div>

    <div class="col-12 text-end text-muted small">
      <?php
        $start = $total_items ? (($cur_page - 1) * $cur_per) + 1 : 0;
        $shown = isset($students) ? count($students) : 0;
        $end = $total_items ? $start + $shown - 1 : 0;
      ?>
      Showing <?= $start; ?> - <?= $end; ?> of <?= $total_items; ?> results
    </div>
  </form>

  <!-- Table -->
  <?php if (empty($students)): ?>
    <div class="alert alert-info">No students found.</div>
  <?php else: ?>
    <div class="table-responsive shadow-sm rounded bg-white">
      <table class="table table-striped table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Email</th>
            <th scope="col" class="text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php
          function row_val($row, $key) {
            if (is_array($row)) return isset($row[$key]) ? $row[$key] : '';
            if (is_object($row)) return isset($row->$key) ? $row->$key : '';
            return '';
          }
        ?>
        <?php foreach($students as $s): ?>
          <tr>
            <td><?= htmlspecialchars(row_val($s,'id'), ENT_QUOTES); ?></td>
            <td><?= htmlspecialchars(row_val($s,'firstname'), ENT_QUOTES); ?></td>
            <td><?= htmlspecialchars(row_val($s,'lastname'), ENT_QUOTES); ?></td>
            <td><?= htmlspecialchars(row_val($s,'email'), ENT_QUOTES); ?></td>
            <td class="text-center">
              <div class="d-inline-flex gap-2">
                <a href="<?= site_url('students/update/'.rawurlencode(row_val($s,'id'))); ?>" 
                   class="btn btn-sm btn-warning text-white">✏️ Update</a>
                <a href="<?= site_url('students/delete/'.rawurlencode(row_val($s,'id'))); ?>" 
                   onclick="return confirm('Are you sure you want to delete this student?');" 
                   class="btn btn-sm btn-danger">🗑️ Delete</a>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <?php if ($total_pages > 1): ?>
      <?php
        $base_q = [];
        if ($q !== '') { $base_q['q'] = $q; }
        if ($cur_per) { $base_q['per_page'] = $cur_per; }
        $build_page_url = function($p) use ($base_q) {
          $qs = http_build_query(array_merge($base_q, ['page' => $p]));
          return site_url('students/get-all') . ($qs ? '?' . $qs : '');
        };
        $start_page = max(1, $cur_page - 2);
        $end_page = min($total_pages, $cur_page + 2);
      ?>
      <nav class="mt-4">
        <ul class="pagination justify-content-center">
          <li class="page-item <?= $cur_page <= 1 ? 'disabled' : '' ?>">
            <a class="page-link" href="<?= $cur_page <= 1 ? '#' : $build_page_url(1); ?>">« First</a>
          </li>
          <li class="page-item <?= $cur_page <= 1 ? 'disabled' : '' ?>">
            <a class="page-link" href="<?= $cur_page <= 1 ? '#' : $build_page_url($cur_page - 1); ?>">‹ Prev</a>
          </li>

          <?php for ($p = $start_page; $p <= $end_page; $p++): ?>
            <li class="page-item <?= $p === $cur_page ? 'active' : '' ?>">
              <a class="page-link" href="<?= $p === $cur_page ? '#' : $build_page_url($p); ?>"><?= $p; ?></a>
            </li>
          <?php endfor; ?>

          <li class="page-item <?= $cur_page >= $total_pages ? 'disabled' : '' ?>">
            <a class="page-link" href="<?= $cur_page >= $total_pages ? '#' : $build_page_url($cur_page + 1); ?>">Next ›</a>
          </li>
          <li class="page-item <?= $cur_page >= $total_pages ? 'disabled' : '' ?>">
            <a class="page-link" href="<?= $cur_page >= $total_pages ? '#' : $build_page_url($total_pages); ?>">Last »</a>
          </li>
        </ul>
      </nav>
    <?php endif; ?>

  <?php endif; ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
