@php
$numberOfItems = old('item-count') ? old('item-count') : 1;
@endphp

@extends('base')

@section('content')
    <p>(*) indicates a required field</p>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form id="po-request" method="post" action="{{ url('/') }}" enctype="multipart/form-data">
        <fieldset id="request-details">
            <legend>Request Details</legend>
            <div class="mb-3">
                <label for="submitter-name">Your Name*</label>
                <input type="text" name="submitter-name" id="submitter-name" maxlength="75" class="form-control" value="{{ old('submitter-name') }}" required />
                @error('submitter-name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="submitter-email">Your Email*</label>
                <input type="email" name="submitter-email" id="submitter-email" maxlength="75" class="form-control" value="{{ old('submitter-email') }}" required />
                @error('submitter-email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" name="urgent-request" class="form-check-input" id="urgent-request" />
                <label for="urgent-request" class="form-check-label">CHECK THIS BOX IF THIS IS AN URGENT REQUEST</label>
                @error('urgent-request')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date-needed">Date Needed*</label>
                <input type="date" name="date-needed" class="form-control" id="date-needed" value="{{ old('date-needed') }}" required />
                @error('date-needed')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="approver-name">Approver Name*</label>
                <select name="approver-name" class="form-select" id="approver-name" required>
                    <option value="">--CHOOSE AN APPROVER--</option>
                    @foreach($faculty as $approver)
                        <option value="{{$approver['netid']}}" {{ old('approver-name') == $approver['netid'] ? 'selected' : '' }}>
                            {{$approver['displayname']}}
                        </option>
                    @endforeach
                </select>
                @error('approver-name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="project-name">Project / Budget Name*</label>
                <input type="text" name="project-name" class="form-control" id="project-name" maxlength="50" value="{{ old('project-name') }}" required />
                @error('project-name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </fieldset>
        <fieldset id="vendor-details">
            <legend>Vendor Details</legend>
            <div class="mb-3">
                <label for="vendor-name">Vendor Name*</label>
                <input type="text" name="vendor-name" class="form-control" id="vendor-name" value="{{ old('vendor-name') }}" required />
                @error('vendor-name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="vendor-address">Vendor Address*</label>
                <textarea name="vendor-address" class="form-control" id="vendor-address" rows="3" required>{{ old('vendor-address') }}</textarea>
                @error('vendor-address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="vendor-website">Vendor Website</label>
                <input type="url" name="vendor-website" class="form-control" id="vendor-website" value="{{ old('vendor-website') }}" />
                @error('vendor-website')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="vendor-fax">Vendor Fax</label>
                <input type="tel" name="vendor-fax" class="form-control" id="vendor-fax" value="{{ old('vendor-fax') }}" />
                @error('vendor-fax')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="contact-name">Contact Name*</label>
                <input type="text" name="contact-name" class="form-control" id="contact-name" maxlength="75" value="{{ old('contact-name') }}" required />
                @error('contact-name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="contact-email">Contact Email*</label>
                <input type="email" name="contact-email" class="form-control" id="contact-email" value="{{ old('contact-email') }}" required />
                @error('contact-email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </fieldset>
        <fieldset id="order-items">
            <div class="d-flex justify-content-between align-content-center mb-3">
                <legend>Order Items</legend>
                <button class="btn btn-primary" id="btn-add-item">Add Item</button>
            </div>
            <div id="item-list">
                @for($i = 0; $i < $numberOfItems; $i++)
                <div id="item{{ $i }}" class="item">
                    <div class="mb-3">
                        <label for="part-number">Catalog / Part #*</label>
                        <input type="text" name="item[{{ $i }}][part-number]" class="form-control" value="{{ old('item.' . $i . '.part-number') }}" required />
                        @error('item.' . $i . '.part-number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description">Description*</label>
                        <textarea name="item[{{ $i }}][description]" class="form-control" rows="3" required>{{ old('item.' . $i . '.description') }}</textarea>
                        @error('item.' . $i . '.description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="item-web-link">Web Link</label>
                        <input type="url" name="item[{{ $i }}][web-link]" class="form-control" value="{{ old('item.' . $i . '.web-link') }}" />
                        @error('item.' . $i . '.web-link')
                            <div class="invalid-feedback">{{ $message }} (Be sure to include 'http://')</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="unit-price">Unit Price*</label>
                        <input type="text" name="item[{{ $i }}][unit-price]" class="form-control unit-price" value="{{ old('item.' . $i . '.unit-price') }}" required />
                        @error('item.' . $i . '.unit-price')
                            <div class="invalid-feedback">{{ $message }} (Don't include the dollar sign)</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="unit">Unit*</label>
                        <input name="item[{{ $i }}][unit]" class="form-control" list="unit-datalist" id="unit" value="{{ old('item.' . $i . '.unit') }}" />
                        @error('item.' . $i . '.unit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
                        <input type="text" name="item[{{ $i }}][quantity]" class="form-control quantity" value="{{ old('item.' . $i . '.quantity') }}" required />
                        @error('item.' . $i . '.quantity')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                @endfor
            </div>
        </fieldset>
        <fieldset>
            <legend>File Upload</legend>
            <div class="mb-3">
                <label for="pdf-file">Order Attachment (PDF Only)</label>
                <input type="file" class="form-control" name="pdf-file" id="pdf-file" accept=".pdf" />
                @error('pdf-file')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </fieldset>
        <input type="hidden" id="item-count" name="item-count" value="{{ old('item-count', 1) }}" />
        @csrf
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
