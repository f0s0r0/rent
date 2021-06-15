<link href="{{ asset('public/dashb/invoice/bootstrap.min.css') }}" rel="stylesheet" id="bootstrap-css">
<script src="{{ asset('public/dashb/invoice/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/dashb/invoice/jquery.min.js') }}"></script>
<link href="{{ asset('public/dashb/invoice/invoice.css') }}" rel="stylesheet">
<div id="invoice">
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="https://lobianijs.com">
                            RN Apartments
                            </a>
                        </h2>
                        <div>Hospital Road</div>
                        <div>0726632373</div>
                        <div>company@example.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to">Felix Osoro</h2>
                        <div class="address">Room No: 78, 0726632373</div>
                        <div class="email"><a href="mailto:john@example.com">john@example.com</a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE 3-2-1</h1>
                        <div class="date">Date of Invoice: 15/5/2021</div>
                        <div class="date">Due Date: 15/5/2021</div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>S/No</th>
                            <th class="text-left">Paid Amount</th>
                            <th class="text-right">Date Paid</th>
                            <th class="text-right">Balance</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="no">1</td>
                            <td class="text-left"><h3>4500</h3>
                            </td>
                            <td class="unit">15/5/2021</td>
                            <td class="qty">0</td>
                            <td class="total">4500</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td>4500.00</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TAX 0%</td>
                            <td>0.00</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td>4500.00</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">The Invoice maybe required incase of any inconveniences caused!! Keep Safe!!!</div>
                </div>
            </main>
            <footer>
                The Invoice is computer generated and is valid without the Lanlord/Caretaker signature
            </footer>
        </div>
        <div></div>
    </div>
</div>