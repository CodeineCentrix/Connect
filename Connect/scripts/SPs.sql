uspAddVendor

@vendor_name, @vendor_description, @face_account, @twit_account, @in_account, @web_link

INSERT INTO VENDOR (vendor_name, vendor_description, face_account, twit_account, in_account, web_link)
VALUES (@vendor_name, @vendor_description, @face_account, @twit_account, @in_account, @web_link);


uspUpdateVendor

@vendor_id, @vendor_name, @vendor_description, @face_account, @twit_account, @in_account, @web_link

UPDATE VENDOR
SET vendor_name = @vendor_name, vendor_description = @vendor_description, face_account = @face_account, twit_account = @twit_account, in_account = @in_account, web_link = @web_link
WHERE vendor_id = @vendor_id;