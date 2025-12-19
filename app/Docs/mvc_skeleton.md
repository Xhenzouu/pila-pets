# MVC Skeleton (Resident Area)

> Quick scaffold outline for controllers, models, views. Replace placeholders as features grow.

## Controllers
- `ResidentsController`: dashboard, profile, myPets, browse
- `PetsController`: index, create, store, edit, update, delete
- Add new controller: `ExampleController` with methods `index`, `show($id)`, `create`, `store`, `edit($id)`, `update($id)`, `delete($id)`

## Models
- `ResidentModel` → table: `residents`, pk: `id`
- `PetModel` → table: `pets`, pk: `id`
- `UserModel` → table: `users`, pk: `id`
- Add new model skeleton:
```
<?php
namespace App\Models;
use CodeIgniter\Model;

class ExampleModel extends Model
{
    protected $table = 'example';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'created_at'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
```

## Views
- Layout: `layouts/resident_main.php`
- Pages: `residents/dashboard.php`, `residents/profile.php`, `residents/my_pets.php`, `residents/browse.php`
- Add new view skeleton:
```
<?= $this->extend('layouts/resident_main') ?>
<?= $this->section('content') ?>
<div class="container py-5">
    <h2 class="mb-3">Page Title</h2>
    <p class="text-muted">Placeholder body content.</p>
</div>
<?= $this->endSection() ?>
```

## Routes (examples)
- `GET /resident/dashboard` → `ResidentsController::dashboard`
- `GET /resident/browse` → `ResidentsController::browse`
- `GET /resident/my-pets` → `ResidentsController::myPets`
- `POST /resident/register-pet` → `PetsController::store`
- Add route skeleton: `$routes->get('example', 'ExampleController::index');`

## Notes
- Keep layout navigation in sync with new pages.
- Use `base_url()` helpers for links and assets.
- Replace placeholder counts/strings with live data when ready.
