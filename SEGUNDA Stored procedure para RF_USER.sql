USE [jubileu]
GO

/****** Object:  StoredProcedure [dbo].[pSelect_UserRFTestAccount]    Script Date: 10/25/2017 12:30:58 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE PROCEDURE [dbo].[pSelect_UserRFTestAccount] 
	-- Add the parameters for the stored procedure here
	@id varchar(16)
AS
BEGIN
	-- SET NOCOUNT ON added to prevent extra result sets from
	-- interfering with SELECT statements.
	SET NOCOUNT ON;

    -- Insert statements for procedure here
	SELECT id FROM [jubileu].[dbo].[tbl_RFTestAccount] 
    WHERE CONVERT(varchar,id) = @id 
END

GO