CREATE TRIGGER [dbo].[GiveCashToFriend]
	ON [dbo].[tbl_base]
	FOR UPDATE
AS 
BEGIN

	SET NOCOUNT ON
	
	DECLARE @account VARCHAR(16)
	DECLARE @friend VARCHAR(16)
	DECLARE @level INT
	DECLARE @dck BIT
	DECLARE @frienddck INT
	DECLARE @friendserial INT
	DECLARE @friendaccount VARCHAR(16)
	
	IF UPDATE(Lv)
	BEGIN
		SELECT @account = Account from INSERTED
		SELECT @friend = Friend FROM [jubileu].[dbo].[tbl_RFTestAccount] WHERE CONVERT(binary,@account) = id
		IF @friend IS NOT NULL
		BEGIN

			SELECT @level = Lv, @dck = DCK FROM INSERTED
		
			IF (@level = 50 AND @dck = 0)
			BEGIN
				SELECT @friendserial = Serial, @friendaccount = Account, @frienddck = DCK FROM [dbo].[tbl_base] WHERE Name = @friend
				IF (@frienddck = 0 AND @friendaccount <> @account)
				BEGIN
					UPDATE [dbo].[tbl_supplement]
					SET ActionPoint_2 = ActionPoint_2 + 5000
					WHERE Serial = @friendserial
				END		
			END


		END		

			
	END
END