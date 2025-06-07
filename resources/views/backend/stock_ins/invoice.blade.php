<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nota Barang Masuk</title>
    <style>
        /* Reset dan dasar */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Courier New', Courier, monospace;
            font-size: 12px;
        }

        /* Wrapper flex untuk tengah vertikal dan horizontal */
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center; /* Vertikal tengah */
            height: 100%;
            padding: 0;
            box-sizing: border-box;
        }

        /* Receipt dengan padding sama di semua sisi dan margin auto */
        .receipt {
            width: 300px;
            max-width: 90%;
            padding: 20px;
            border: 1px dashed #ccc;
            box-sizing: border-box;
            margin: auto;
            background: #fff;
        }

        /* Text align dan font weight */
        .center { text-align: center; }
        .bold { font-weight: bold; }

        /* Garis pembatas */
        .divider {
            border-top: 1px dashed #000;
            margin: 6px 0 10px;
        }

        /* Baris item dengan flex */
        .line-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 4px;
            flex-wrap: wrap;
        }

        .line-item span {
            display: inline-block;
        }

        /* Label dengan flex grow */
        .label {
            flex: 2;
        }

        /* Qty, price, total rata kanan */
        .qty,
        .price,
        .total {
            flex: 1;
            text-align: right;
        }

        /* Detail produk di tengah */
        .product-detail {
            margin-bottom: 12px;
            text-align: center;
        }

        .product-detail strong {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .product-detail .line-item {
            justify-content: center !important;
            gap: 10px;
        }

        .product-detail .qty,
        .product-detail .price,
        .product-detail .total {
            flex: none;
            display: inline-block;
            text-align: center;
            min-width: 50px;
        }

        /* Summary */
        .summary {
            margin-top: 10px;
            margin-bottom: 12px;
        }

        .summary .line-item {
            font-weight: bold;
        }

        /* Catatan dan footer */
        .footer {
            text-align: center;
            font-size: 10px;
            margin-top: 10px;
        }

        .note {
            font-size: 10px;
            margin-top: 6px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="receipt">
            <div class="center bold">GUDANG UTAMA</div>
            <div class="center">Jl. Contoh No. 123, Jakarta</div>

            <div class="divider"></div>

            <div class="line-item">
                <span class="label">No. Transaksi:</span>
                <span class="total">{{ $stockIn->reference_code }}</span>
            </div>
            <div class="line-item">
                <span class="label">Tanggal:</span>
                <span class="total">{{ \Carbon\Carbon::parse($stockIn->stock_in_date)->format('d/m/Y') }}</span>
            </div>
            <div class="line-item">
                <span class="label">User:</span>
                <span class="total">{{ $stockIn->user->name }}</span>
            </div>
            <div class="line-item">
                <span class="label">Supplier:</span>
                <span class="total">{{ $stockIn->supplier->name }}</span>
            </div>

            <div class="divider"></div>

            <div class="bold mb-1">Detail Barang:</div>

            <div class="product-detail">
                <strong>{{ $stockIn->product->name }}</strong>
                <div class="line-item">
                    <span class="qty">{{ $stockIn->quantity }} {{ $stockIn->product->unit }}</span>
                    <span class="price">Rp 0</span>
                    <span class="total">Rp 0</span>
                </div>
            </div>

            <div class="divider"></div>

            <div class="summary">
                <div class="line-item">
                    <span class="label">Total</span>
                    <span class="total">Rp 0</span>
                </div>
                <div class="line-item">
                    <span class="label">Potongan</span>
                    <span class="total">Rp 0</span>
                </div>
                <div class="line-item">
                    <span class="label">Total Nett</span>
                    <span class="total">Rp 0</span>
                </div>
            </div>

            <div class="note">
                Barang yang sudah dibeli tidak dapat ditukar atau dikembalikan.
                <br><br>
                * Syarat Garansi:
                <ol style="margin-left: 12px;">
                    <li>Nota Pembelian</li>
                    <li>Barang lengkap dan segel tidak rusak</li>
                    <li>Garansi toko 7 hari</li>
                </ol>
                <br>
                <div class="center">
                    <p>Semoga sukses selalu 🙏</p>
                    <p>Dicetak: {{ \Carbon\Carbon::now()->format('d M Y H:i') }}</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
