@extends('base')

@section('content')
    <p>(*) indicates a required field</p>
    <form id="po-request" method="post" action="#" enctype="multipart/form-data">
        <fieldset id="request-details">
            <legend>Request Details</legend>
            <div class="mb-3">
                <label for="submitter-name">Your Name*</label>
                <input type="text" id="submitter-name" maxlength="75" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="submitter-email">Your Email*</label>
                <input type="email" id="submitter-email" maxlength="75" class="form-control" required />
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="urgent-request" />
                <label for="urgent-request" class="form-check-label">CHECK THIS BOX IF THIS IS AN URGENT REQUEST</label>
            </div>
            <div class="mb-3">
                <label for="date-needed">Date Needed*</label>
                <input type="date" class="form-control" id="date-needed" required />
            </div>
            <div class="mb-3">
                <label for="approver-name">Approver Name*</label>
                <select class="form-select" id="approver-name" required>
                    <option value="">--CHOOSE AN APPROVER--</option>
                    @foreach($faculty as $approver)
                        <option value="{{$approver['netid']}}">{{$approver['displayname']}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="project-name">Project / Budget Name*</label>
                <input type="text" class="form-control" id="project-name" maxlength="50" required />
            </div>
        </fieldset>
        <fieldset id="vendor-details">
            <legend>Vendor Details</legend>
            <div class="mb-3">
                <label for="vendor-name">Vendor Name*</label>
                <input type="text" class="form-control" id="vendor-name" required />
            </div>
            <div class="mb-3">
                <label for="vendor-address">Vendor Address*</label>
                <textarea class="form-control" id="vendor-address" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="vendor-website">Vendor Website</label>
                <input type="url" class="form-control" id="vendor-website" />
            </div>
            <div class="mb-3">
                <label for="vendor-fax">Vendor Fax</label>
                <input type="tel" class="form-control" id="vendor-fax" />
            </div>
            <div class="mb-3">
                <label for="contact-name">Contact Name*</label>
                <input type="text" class="form-control" id="contact-name" maxlength="75" required />
            </div>
            <div class="mb-3">
                <label for="contact-email">Contact Email*</label>
                <input type="email" class="form-control" id="contact-email" required />
            </div>
        </fieldset>
        <fieldset id="order-items">
            <div class="d-flex justify-content-between align-content-center mb-3">
                <legend>Order Items</legend>
                <button class="btn btn-primary" id="btn-add-item">Add Item</button>
            </div>
            <div id="item-list">
                <div id="item1" class="item">
                    <div class="mb-3">
                        <label for="part-number">Catalog / Part #*</label>
                        <input type="text" class="form-control" name="part-number[]" required />
                    </div>
                    <div class="mb-3">
                        <label for="item-description">Description*</label>
                        <textarea class="form-control" name="item-description[]" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="item-web-link">Web Link</label>
                        <input type="url" class="form-control" name="item-web-link[]" />
                    </div>
                    <div class="mb-3">
                        <label for="unit-price">Unit Price*</label>
                        <input type="text" class="form-control unit-price" name="unit-price[]" required />
                    </div>
                    <div class="mb-3">
                        <label for="unit">Unit*</label>
                        <input class="form-control" list="unit-datalist" id="unit" />
                        <datalist id="unit-datalist">
                            <option value="BAG" />
                            <option value="BKT" />
                            <option value="BND" />
                            <option value="BOWL" />
                            <option value="BX" />
                            <option value="CRD" />
                            <option value="CM" />
                            <option value="CS" />
                            <option value="CTN" />
                            <option value="DZ" />
                            <option value="EA" />
                            <option value="FT" />
                            <option value="GAL" />
                            <option value="GROSS" />
                            <option value="IN" />
                            <option value="KIT" />
                            <option value="LOT" />
                            <option value="M" />
                            <option value="MM" />
                            <option value="PC" />
                            <option value="PK" />
                            <option value="PK100" />
                            <option value="PK50" />
                            <option value="PR" />
                            <option value="RACK" />
                            <option value="RL" />
                            <option value="SET" />
                            <option value="SET3" />
                            <option value="SET4" />
                            <option value="SET5" />
                            <option value="SGL" />
                            <option value="SQFT" />
                            <option value="TUBE" />
                            <option value="YD" />
                        </datalist>
                    </div>
                    <div class="mb-3">
                        <label for="quantity">Quantity to Order*</label>
                        <input type="text" class="form-control quantity" name="quantity[]" required />
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <legend>File Upload</legend>
            <div class="mb-3">
                <label for="pdf-file">Order Attachment (PDF Only)</label>
                <input type="file" class="form-control" name="pdf-file" id="pdf-file" />
            </div>
        </fieldset>
    </form>
    <footer class="fixed-bottom">
        <div class="container d-flex justify-content-between">
            <button class="btn btn-primary" id="btn-send-request">Send Request</button>
            <div>
                <strong>Order Total: <span id="order-total">$0.00</span></strong>
            </div>
        </div>
    </footer>
@endsection
