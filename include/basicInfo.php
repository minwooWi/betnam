<?php
$r_type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "";
$r_crud = isset($_REQUEST['crud']) ? $_REQUEST['crud'] : "";

if($r_crud == "c") {
?>
<div>
    <img src="./img/banner.png" alt="banner" class="mainBanner">
</div>
<div class="contentBox titleWrap">
    <div class="titleKor">예약 확정서</div>
    <div class="titleEng">CONFIRMATION LETTER</div>
    <input id="insertInput" type="submit" class="btn btn-primary btn-block">
    <input id="savePdfBtn" type="button" class="btn btn-primary btn-block" value="PDF다운로드">
</div>

<div class="contentBox">
    <label for="deposit_date" class="label">예약금</label>
    <input type="date" class="" id="deposit_date" name="deposit_date" required>
    <select class="selectpicker" name="deposit_status" id="deposit_status" required>
        <option value="">-</option>
        <option value="1">입금대기</option>
        <option value="2">입금완료</option>
    </select>
    <input type="text" class="" id="deposit_amount" name="deposit_amount" required>
    <select class="selectpicker" name="deposit_currency_type" id="deposit_currency_type" required>
        <option value="">-</option>
        <option value="1">원</option>
        <option value="2">베트남동</option>
    </select>
</div>
<div class="contentBox">
    <label for="deposit_date" class="label">잔금</label>
    <input type="date" class="" id="payment_date" name="payment_date" required>
    <select class="selectpicker" name="payment_status" id="payment_status" required>
        <option value="">-</option>
        <option value="1">입금예정</option>
        <option value="2">입금완료</option>
    </select>
    <input type="text" class="" id="payment_amount" name="payment_amount" required>
    <select class="selectpicker" name="payment_currency_type" id="payment_currency_type" required>
        <option value="">-</option>
        <option value="1">원</option>
        <option value="2">베트남동</option>
    </select>
</div>
<div class="contentBox">
    <div class="company_info_wrap">
        <div class="travelAgentInfo01">
            회사 정보<br />
            Travel Agent Info
        </div>
        <div class="travelAgentInfoInputWrap01">
        <textarea id="company_info" name="company_info" class="travelAgentInfoInput textArea_topTr" required readonly>VIETNAM CHOICE
A902, 115 Nguyen Van Linh, Vinh Trung, Hai Chau, Da Nang</textarea>
        </div>
    </div>
    <div class="company_info_wrap">
        <div class="company_info01">
            예약자 정보<br />
            Booker Info
        </div>
        <div class="reservation_maker_info_wrap01">
            <input type="text" id="reservation_maker_info" name="reservation_maker_info" class="reservation_maker_info_input" required>
        </div>
        <div class="employee_email_info_inputWrap">
            <input type="text" id="employee_email_info" name="employee_email_info" class="employee_email_info_input" required>
        </div>
        <div class="employee_email_default_info">
            <div class="employee_email_default_info_text">@vetnamchoice.com</div>
        </div>
    </div>
</div>
<div class="contentBox">
    <div class="gbcWrap">
        <div class="gbc">
            고객 성함<br />
            Guest Name
        </div>
        <div class="gbc">
            예약일자<br />
            Booking period
        </div>
        <div class="gbc">
            연락처<br />
            Contact
        </div>
    </div>
    <div class="gbcWrapInput">
        <div>
            <input type="text" class="" id="customer_name" name="customer_name" required>
        </div>
        <div>
            <input type="date" class="reservation_date" id="reservation_date" name="reservation_date" required>
        </div>
        <div>
            <input type="text" class="" id="contact_number" name="contact_number" required>
        </div>
    </div>
</div>
<?php
} else if($r_crud == "u") {
?>
<div>
    <img src="./img/banner.png" alt="banner" class="mainBanner">
</div>
<div class="contentBox titleWrap">
    <div class="titleKor">예약 확정서</div>
    <div class="titleEng">CONFIRMATION LETTER</div>
    <input type="hidden" value="<?php echo $reservation_number;?>" name="reservation_number">
    <input id="updateInput" type="submit" class="btn btn-primary btn-block">
    <input id="savePdfBtn" type="button" class="btn btn-primary btn-block" value="PDF다운로드">
</div>
<div class="contentBox">
    <label for="deposit_date" class="label">예약금</label>
    <input type="date" class="" id="deposit_date" name="deposit_date" value="<?php echo $deposit_date;?>" required>
        <select class="selectpicker" name="deposit_status" id="deposit_status" required>
        <option value="1" <?php if($deposit_status == "1") echo "SELECTED";?>>입금대기</option>
        <option value="2" <?php if($deposit_status == "2") echo "SELECTED";?>>입금완료</option>
    </select>
    <input type="text" class="" id="deposit_amount" name="deposit_amount" value="<?php echo $deposit_amount;?>" required>
    <select class="selectpicker" name="deposit_currency_type" id="deposit_currency_type" required>
        <option value="1" <?php if($deposit_currency_type == "1") echo "SELECTED";?>>원</option>
        <option value="2" <?php if($deposit_currency_type == "2") echo "SELECTED";?>>베트남동</option>
    </select>
</div>
<div class="contentBox">
    <label for="deposit_date" class="label">잔금</label>
    <input type="date" class="" id="payment_date" name="payment_date" value="<?php echo $payment_date;?>" required>
    <select class="selectpicker" name="payment_status" id="payment_status" required>
        <option value="1" <?php if($payment_status == "1") echo "SELECTED";?>>입금예정</option>
        <option value="2" <?php if($payment_status == "2") echo "SELECTED";?>>입금완료</option>
    </select>
    <input type="text" class="" id="payment_amount" name="payment_amount" value="<?php echo $payment_amount;?>"  required>
    <select class="selectpicker" name="payment_currency_type" id="payment_currency_type" required>
        <option value="1" <?php if($payment_currency_type == "1") echo "SELECTED";?>>원</option>
        <option value="2" <?php if($payment_currency_type == "2") echo "SELECTED";?>>베트남동</option>
    </select>
</div>
<div class="contentBox">
    <div class="company_info_wrap">
        <div class="company_info01">
            회사 정보<br>
            Travel Agent Info
        </div>
        <div class="travelAgentInfoInputWrap01">
            <textarea id="company_info" name="company_info" class="travelAgentInfoInput textArea_topTr" required readonly><?php echo str_replace("\\r\\n", "\n", $company_info);?></textarea>
        </div>
    </div>
    <div class="company_info_wrap">
        <div class="company_info01">
            예약자 정보<br>
            Booker Info
        </div>
        <div class="reservation_maker_info_wrap01">
            <input type="text" id="reservation_maker_info" name="reservation_maker_info" class="reservation_maker_info_input" value="<?php echo $reservation_maker_info;?>"  required>
        </div>
        <div class="employee_email_info_inputWrap">
            <input type="text" id="employee_email_info" name="employee_email_info" class="employee_email_info_input" value="<?php echo $employee_email_info;?>">
        </div>
        <div class="employee_email_default_info">
            <div class="employee_email_default_info_text">@vetnamchoice.com</div>
        </div>
    </div>
</div>
<div class="contentBox">
    <div class="gbcWrap">
        <div class="gbc">
            고객 성함<br>
            Guest Name
        </div>
        <div class="gbc">
            예약일자<br>
            Booking period
        </div>
        <div class="gbc">
            연락처<br>
            Contact
        </div>
    </div>
    <div class="gbcWrapInput">
        <div>
            <input type="text" class="" id="customer_name" name="customer_name" value="<?php echo $customer_name;?>" required>
        </div>
        <div>
            <input type="date" class="reservation_date" id="reservation_date" name="reservation_date" value="<?php echo $reservation_date;?>" required>
        </div>
        <div>
            <input type="text" class="" id="contact_number" name="contact_number" value="<?php echo $contact_number;?>" required>
        </div>
    </div>
</div>
<?php
}
?>