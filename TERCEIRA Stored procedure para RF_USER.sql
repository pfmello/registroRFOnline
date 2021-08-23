USE [jubileu]
GO

/****** Object:  StoredProcedure [dbo].[pInsert_UserRFTestAccount]    Script Date: 10/25/2017 12:29:22 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[pInsert_UserRFTestAccount] 
	-- Add the parameters for the stored procedure here
	@id varchar(16),
	@password varchar(24),
	@email varchar(50),
	@friend varchar(17)
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	INSERT INTO [jubileu].[dbo].[tbl_RFTestAccount]
           ([id]
           ,[password]
           ,[BCodeTU]
           ,[email]
           ,[Friend])
     VALUES
           (CONVERT(binary,@id)
           ,CONVERT(binary,@password)
           ,1
           ,@email
           ,@friend)
END

GO


