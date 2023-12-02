@extends('base')

@section('content')
    <h3>A new purchase order request has been submitted. Please view the details below:</h3>
    <table>
        <tr>
            <td>Submitter</td>
            <td>{{ $order->getSubmitter()->getName() }}</td>
        </tr>
        <tr>
            <td>Submitter Email</td>
            <td>
                <a href="mailto:{{ $order->getSubmitter()->getEmailAddress() }}">{{ $order->getSubmitter()->getEmailAddress() }}</a>
            </td>
        </tr>
        <tr>
            <td>Urgent</td>
            <td>{{ $order->isUrgent() ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
            <td>Date Needed</td>
            <td>{{ $order->getDateNeeded()->format('m-d-Y') }}</td>
        </tr>
        <tr>
            <td>Approver</td>
            <td>{{ $order->getApprover()->getDisplayName() }}</td>
        </tr>
        <tr>
            <td>Project Name</td>
            <td>{{ $order->getProjectName() }}</td>
        </tr>
        <tr>
            <td>Vendor Name</td>
            <td>{{ $order->getVendor()->getName() }}</td>
        </tr>
        <tr>
            <td>Vendor Address</td>
            <td>{{ $order->getVendor()->getAddress() }}</td>
        </tr>
        <tr>
            <td>Vendor Website</td>
            <td>{{ $order->getVendor()->getWebsite() }}</td>
        </tr>
        <tr>
            <td>Vendor Fax</td>
            <td>{{ $order->getVendor()->getFax() }}</td>
        </tr>
        <tr>
            <td>Contact Name</td>
            <td>{{ $order->getVendor()->getContactName() }}</td>
        </tr>
        <tr>
            <td>Contact Email</td>
            <td>
                <a href="mailto:{{ $order->getVendor()->getContactEmail() }}">{{ $order->getVendor()->getContactEmail() }}</a>
            </td>
        </tr>
        @foreach($order->getOrderItems() as $item)
            <tr>
                <td colspan="2"><strong>Item {{ $loop->index + 1 }}</strong></td>
            </tr>
            <tr>
                <td>Part Number</td>
                <td>{{ $item->getPartNumber() }}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{ $item->getDescription() }}</td>
            </tr>
            <tr>
                <td>Link</td>
                <td>
                    <a href="{{ $item->getWebLink() }}" target="_blank">{{ $item->getWebLink() }}</a>
                </td>
            </tr>
            <tr>
                <td>Unit Price</td>
                <td>{{ $item->getUnitPrice() }}</td>
            </tr>
            <tr>
                <td>Unit</td>
                <td>{{ $item->getUnit() }}</td>
            </tr>
            <tr>
                <td>Quantity</td>
                <td>{{ $item->getQuantity() }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2">Order Total: {{ $order->calculateOrderTotal() }}</td>
        </tr>
    </table>
@endsection
