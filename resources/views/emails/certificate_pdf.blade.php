@component('mail::PDF')
# Certificate of Achievement

@component('mail::panel')
Name: <strong>{{ $users['name'] }}</strong>
<br>
Email: <strong>{{ $users['email'] }}</strong>
<br>
Organization: <strong>{{ $users['organization'] }}</strong>
@endcomponent

<!-- @component('mail::panel')
# Payslip Details
<ul>
    <li>
        Transaction ID: <strong>{{ $receipt['transaction_id'] }}</strong>
    </li>
    <li>
        Salary Amount: <strong>{{ $receipt['employee_salary'] }}</strong>
    </li>
    <li>
        Paid On: <strong>{{ $receipt['paid_on'] }}</strong>
    </li>
    <li>
        Payment Method: <strong>{{ $receipt['sent_via'] }}</strong>
    </li>
</ul>
@endcomponent -->

@endcomponent