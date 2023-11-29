@extends('base')

@section('content')
    <form id="po-request">
        <fieldset>
            <legend>Request Details</legend>
            <div class="mb-3">
                <label for="submitter-name">Your Name:</label>
                <input type="text" id="submitter-name" maxlength="75" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="submitter-email">Your Email</label>
                <input type="email" id="submitter-email" maxlength="75" class="form-control" />
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="urgent-request" />
                <label for="urgent-request" class="form-check-label">CHECK THIS BOX IF THIS IS AN URGENT REQUEST</label>
            </div>
            <div class="mb-3">
                <label for="date-needed">Date Needed</label>
                <input type="date" class="form-control" id="date-needed" />
            </div>
            <div class="mb-3">
                <label for="approver-name">Approver Name</label>
                <select class="form-select" id="approver-name">
                    <option value="">--CHOOSE AN APPROVER--</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="project-name">Project / Budget Name</label>
                <input type="text" class="form-control" id="project-name" maxlength="50" />
            </div>
        </fieldset>
        <fieldset>
            <legend>Vendor Details</legend>
            <div class="mb-3">
                <label for="vendor-name">Vendor Name</label>
                <input type="text" class="form-control" id="vendor-name" />
            </div>
            <div class="mb-3">
                <label for="vendor-address">Vendor Address</label>
                <textarea class="form-control" id="vendor-address" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="vendor-website">Vendor Website</label>
                <input type="url" class="form-control" id="vendor-website" />
            </div>
            <div class="mb-3">
                <label for="project-name">Project / Budget Name</label>
                <input type="text" class="form-control" id="project-name" maxlength="50" />
            </div>
            <div class="mb-3">
                <label for="vendor-fax">Vendor Fax</label>
                <input type="tel" class="form-control" id="vendor-fax" />
            </div>
            <div class="mb-3">
                <label for="contact-name">Contact Name</label>
                <input type="text" class="form-control" id="contact-name" maxlength="75" />
            </div>
            <div class="mb-3">
                <label for="contact-email">Contact Email</label>
                <input type="email" class="form-control" id="contact-email" />
            </div>
        </fieldset>
        <fieldset>
            <legend>Order Items</legend>
            <div class="mb-3">
                <label for="part-number">Catalog / Part #</label>
                <input type="text" class="form-control" id="part-number" />
            </div>
            <div class="mb-3">
                <label for="item-description">Description</label>
                <textarea class="form-control" id="item-description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="item-web-link">Web Link</label>
                <input type="url" class="form-control" id="item-web-link" />
            </div>
            <div class="mb-3">
                <label for="unit-price">Unit Price</label>
                <input type="number" class="form-control" id="unit-price" />
            </div>
            <div class="mb-3">
                <label for="unit">Unit</label>
                <input type="text" class="form-control" id="unit" />
            </div>
            <div class="mb-3">
                <label for="quantity">Quantity to Order</label>
                <input type="number" class="form-control" id="quantity" />
            </div>
        </fieldset>
    </form>
    <footer>
        <div class="container">
            <strong>Order Total: <span id="order-total">$0.00</span></strong>
        </div>
    </footer>
@endsection
