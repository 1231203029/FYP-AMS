<!doctype html>
<html><head>
  <meta charset="utf-8">
  <title>Form grid test</title>
  <style>
    /* minimal copy of required CSS to test */
    :root{--border-color:#d1d5db; --text-color:#1f1f2e;}
    .card{background:#fff;padding:20px;width:800px;margin:20px;}
    .card form{display:grid;grid-template-columns:160px 1fr;gap:12px;align-items:start;}
    .card label{text-align:right;padding-top:6px;font-weight:500;}
    .card input,.card select,.card textarea{width:100%;padding:8px;border:1px solid var(--border-color);border-radius:4px;}
    .card textarea{min-height:86px;}
  </style>
</head><body>
  <div class="card">
    <form>
      <label>NRIC:</label><input type="number" name="nric">
      <label>Name:</label><input type="text" name="name">
      <label>Gender:</label>
        <div>
          <input type="radio" id="male" name="gender" value="Male"><label for="male">Male</label>
          <input type="radio" id="female" name="gender" value="Female"><label for="female">Female</label>
        </div>
      <label>Race:</label>
        <select name="race"><option>Malay</option><option>Chinese</option></select>
      <label>Home Address:</label><textarea name="address"></textarea>
      <label>State:</label><input type="text" name="state">
    </form>
  </div>
</body></html>
