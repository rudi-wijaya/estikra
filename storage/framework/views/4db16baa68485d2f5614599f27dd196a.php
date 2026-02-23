

<?php $__env->startSection('page_title', 'Manajemen Pesan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-header mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="page-title">Manajemen Pesan</h1>
                <p class="page-subtitle">Kelola semua pesan kontak dalam sistem</p>
            </div>
        </div>
    </div>

    <!-- Filter -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="<?php echo e(route('admin.messages.index')); ?>" class="row g-3">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama atau nomor HP..." value="<?php echo e(request('search')); ?>">
                </div>
                <div class="col-md-4">
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="read" <?php echo e(request('status') == 'read' ? 'selected' : ''); ?>>Sudah Dibaca</option>
                        <option value="unread" <?php echo e(request('status') == 'unread' ? 'selected' : ''); ?>>Belum Dibaca</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-outline-primary w-100">
                        <i class="bi bi-search me-2"></i>Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Messages Table -->
    <div class="card">
        <div class="card-header">
            <i class="bi bi-chat-dots me-2"></i>Daftar Pesan
        </div>
        <div class="table-responsive">
            <table class="table mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px">#</th>
                        <th>Pengirim</th>
                        <th>Nomor HP</th>
                        <th>Subjek</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th>Status Baca</th>
                        <th>Status Balas</th>
                        <th style="width: 120px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="<?php echo e(!$message->read_at ? 'table-light fw-semibold' : ''); ?>">
                            <td><?php echo e($loop->iteration); ?></td>
                            <td>
                                <i class="bi bi-person-circle me-2"></i><?php echo e($message->nama ?? $message->name ?? 'Anonymous'); ?>

                            </td>
                            <td>
                                <a href="https://wa.me/62<?php echo e(ltrim($message->nomor_hp, '0')); ?>" target="_blank" title="Chat via WhatsApp"><?php echo e($message->nomor_hp); ?></a>
                            </td>
                            <td>
                                <small class="text-primary fw-semibold"><?php echo e($message->subjek ?? 'Tanpa Subjek'); ?></small>
                            </td>
                            <td>
                                <small><?php echo e(Str::limit($message->pesan ?? $message->message, 50)); ?></small>
                            </td>
                            <td>
                                <small><?php echo e($message->created_at->format('d/m/Y H:i')); ?></small>
                            </td>
                            <td>
                                <?php if($message->read_at): ?>
                                    <span class="badge bg-success">
                                        <i class="bi bi-check-circle me-1"></i>Dibaca
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-warning">
                                        <i class="bi bi-exclamation-circle me-1"></i>Belum Dibaca
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($message->replied_at): ?>
                                    <span class="badge bg-success">
                                        <i class="bi bi-check2-circle me-1"></i>Dibalas
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-secondary">
                                        <i class="bi bi-clock me-1"></i>Belum Dibalas
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('admin.messages.show', $message->id)); ?>" class="btn btn-sm btn-outline-info" title="Lihat">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form method="POST" action="<?php echo e(route('admin.messages.destroy', $message->id)); ?>" style="display: inline;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="button" class="btn btn-sm btn-outline-danger" onclick="confirmDelete(event, '<?php echo e($message->nama ?? $message->name ?? 'Pesan'); ?>')" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="9" class="text-center text-muted py-5">
                                <i class="bi bi-inbox" style="font-size: 48px; opacity: 0.5;"></i>
                                <p class="mt-3">Belum ada pesan</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <?php if($messages->hasPages()): ?>
        <div class="d-flex justify-content-center mt-4">
            <?php echo e($messages->links()); ?>

        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        function confirmDelete(e, messageName) {
            e.preventDefault();
            if (confirm(`Apakah Anda yakin ingin menghapus pesan dari "${messageName}"? Tindakan ini tidak dapat dibatalkan.`)) {
                e.target.closest('form').submit();
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\estikra\resources\views/admin/messages/index.blade.php ENDPATH**/ ?>