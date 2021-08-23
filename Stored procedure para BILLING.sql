
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO

CREATE PROCEDURE [dbo].[pInsert_UserStatusAccount]
	-- Add the parameters for the stored procedure here
	@id varchar(16)
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	INSERT INTO [cantina].[dbo].[tbl_UserStatus] ([id], [Status], [DTStartPrem], [DTEndPrem], [Cash], [Bonus])
	VALUES (@id, 1, GETDATE(), GETDATE(), 0, 0)
END
GO
