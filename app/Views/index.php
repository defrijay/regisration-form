<!--  -->
    <h1>FE Form List</h1>
    <!-- <a href=" ?>">Create New Form</a> -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Nomor</th>
                <th>Nama Lengkap</th>
                <th>NIM</th>
                <th>Produk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($merchs as $merch): ?>
                <tr>
                    <td><?= $merch['id'] ?></td>
                    <td><?= $merch['email'] ?></td>
                    <td><?= $merch['nomor_telepon'] ?></td>
                    <td><?= $merch['nama_lengkap'] ?></td>
                    <td><?= $merch['nim'] ?></td>
                    <td><?= $merch['produk_satuan'] ?></td>
                    <!-- <td>

                            <button type="submit">Delete</button>
                        </form>
                    </td> -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
