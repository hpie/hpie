USE [forest_depo]
GO

SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [tally_sheet_chl](
	[code] [int] IDENTITY(1,1) NOT NULL,
	[lot_no] [varchar](50) NULL,
	[date_of_chl] [datetime] NULL,
	[spec] [varchar](50) NULL,
	[size] [int] NULL,
	[remarks] [varchar](50) NULL,
	[date_of_rec] [datetime] NULL,
	[challan_no] [varchar](50) NULL,
	[division] [varchar](50) NULL,
	[truck_no] [varchar](50) NULL,
	[size_type] [varchar](50) NULL,
	[size_vol] [decimal](18, 3) NULL,
	[kind] [varchar](50) NULL,
	[dep] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tally_sheet]    Script Date: 05/20/2013 15:10:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tally_sheet](
	[code] [int] IDENTITY(1,1) NOT NULL,
	[scant_no] [int] NULL,
	[lot_no] [varchar](50) NULL,
	[date_of_chl] [datetime] NULL,
	[spec] [varchar](50) NULL,
	[size] [int] NULL,
	[grade] [varchar](50) NULL,
	[stack] [varchar](50) NULL,
	[remarks] [varchar](50) NULL,
	[date_of_rec] [datetime] NULL,
	[challan_no] [varchar](50) NULL,
	[division] [varchar](50) NULL,
	[truck_no] [varchar](50) NULL,
	[size_type] [varchar](50) NULL,
	[size_vol] [decimal](18, 3) NULL,
	[as_per_no] [int] NULL,
	[as_per_vol] [decimal](18, 3) NULL,
	[kind] [varchar](50) NULL,
	[hsd_lot_no] [varchar](50) NULL,
	[mark_to_auction] [varchar](50) NULL,
	[auction_date] [datetime] NULL,
	[name_purchaser] [varchar](50) NULL,
	[rel] [varchar](50) NULL,
	[bid_amt] [decimal](18, 2) NULL,
	[rate] [decimal](18, 2) NULL,
	[average] [decimal](18, 2) NULL,
	[bid_avg] [decimal](18, 2) NULL,
	[dep] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [forest_hsd].[statement_auc_result]    Script Date: 05/20/2013 15:10:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [statement_auc_result](
	[code] [int] IDENTITY(1,1) NOT NULL,
	[bid_paper_no] [varchar](50) NULL,
	[name_of_pur] [varchar](50) NULL,
	[lot_no] [varchar](50) NULL,
	[stack_no] [varchar](50) NULL,
	[spec] [varchar](50) NULL,
	[size] [varchar](50) NULL,
	[no] [int] NULL,
	[vol_m3] [varchar](50) NULL,
	[rate_ob_per_piece] [varchar](50) NULL,
	[rate_ob_per_m3] [varchar](50) NULL,
	[sale_bid_amt] [decimal](18, 2) NULL,
	[floor_per_piece] [varchar](50) NULL,
	[floor_per_m3] [varchar](50) NULL,
	[amt] [decimal](18, 2) NULL,
	[var_amt] [decimal](18, 2) NULL,
	[var_percent] [varchar](50) NULL,
	[auction_date] [datetime] NULL,
	[hsd_lot_no] [varchar](50) NULL,
	[division] [varchar](50) NULL,
	[dep] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[spec_type]    Script Date: 05/20/2013 15:10:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[spec_type](
	[code] [int] IDENTITY(1,1) NOT NULL,
	[deodar_811] [varchar](50) NULL,
	[deodar_812] [varchar](50) NULL,
	[deodar_821] [varchar](50) NULL,
	[deodar_822] [varchar](50) NULL,
	[deodar_831] [varchar](50) NULL,
	[deodar_832] [varchar](50) NULL,
	[kail_911] [varchar](50) NULL,
	[kail_912] [varchar](50) NULL,
	[kail_921] [varchar](50) NULL,
	[kail_922] [varchar](50) NULL,
	[kail_931] [varchar](50) NULL,
	[kail_932] [varchar](50) NULL,
	[fir_1011] [varchar](50) NULL,
	[fir_1012] [varchar](50) NULL,
	[fir_1021] [varchar](50) NULL,
	[fir_1031] [varchar](50) NULL,
	[fir_1032] [varchar](50) NULL,
	[chil_1111] [varchar](50) NULL,
	[chil_1112] [varchar](50) NULL,
	[chil_1121] [varchar](50) NULL,
	[chil_1122] [varchar](50) NULL,
	[chil_1131] [varchar](50) NULL,
	[chil_1132] [varchar](50) NULL,
	[other_1211] [varchar](50) NULL,
	[other_1212] [varchar](50) NULL,
	[other_1221] [varchar](50) NULL,
	[other_1222] [varchar](50) NULL,
	[other_1231] [varchar](50) NULL,
	[other_1232] [varchar](50) NULL,
	[total_1311] [varchar](50) NULL,
	[total_1312] [varchar](50) NULL,
	[total_1321] [varchar](50) NULL,
	[total_1322] [varchar](50) NULL,
	[total_1331] [varchar](50) NULL,
	[total_1332] [varchar](50) NULL,
	[remarks] [varchar](50) NULL,
	[challan_no] [varchar](50) NULL,
	[fir_1022] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [forest_hsd].[spec_size_type]    Script Date: 05/20/2013 15:10:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [spec_size_type](
	[code] [int] IDENTITY(1,1) NOT NULL,
	[spec] [varchar](50) NULL,
	[size_type] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[spec]    Script Date: 05/20/2013 15:10:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[spec](
	[code] [int] IDENTITY(1,1) NOT NULL,
	[spec] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[size_type]    Script Date: 05/20/2013 15:10:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[size_type](
	[code] [int] IDENTITY(1,1) NOT NULL,
	[size_type] [varchar](50) NULL,
	[vol] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[sale_depo]    Script Date: 05/20/2013 15:10:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[sale_depo](
	[code] [int] IDENTITY(1,1) NOT NULL,
	[name_div] [varchar](50) NULL,
	[date] [datetime] NULL,
	[sl_no] [varchar](50) NULL,
	[date_of_dis] [datetime] NULL,
	[rem_ord_no] [varchar](50) NULL,
	[rem_date] [datetime] NULL,
	[how_disp] [varchar](50) NULL,
	[challan_no] [varchar](50) NULL,
	[vehicle_no] [varchar](50) NULL,
	[lot_no] [varchar](50) NULL,
	[species] [varchar](50) NULL,
	[size] [varchar](50) NULL,
	[no] [varchar](50) NULL,
	[vol] [varchar](50) NULL,
	[remarks] [varchar](50) NULL,
	[dep] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[report_1]    Script Date: 05/20/2013 15:10:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[report_1](
	[code] [int] IDENTITY(1,1) NOT NULL,
	[date_of_opening] [datetime] NULL,
	[stack_no] [varchar](50) NULL,
	[speci_kind] [varchar](50) NULL,
	[total_no] [int] NULL,
	[total_vol] [int] NULL,
	[challan_no] [varchar](50) NULL,
	[no] [varchar](50) NULL,
	[size] [varchar](50) NULL,
	[dep] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[release_order]    Script Date: 05/20/2013 15:10:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[release_order](
	[code] [int] IDENTITY(1,1) NOT NULL,
	[rel_no] [varchar](50) NULL,
	[date] [datetime] NULL,
	[pur_amt] [decimal](18, 3) NULL,
	[rece_vide_no] [varchar](50) NULL,
	[rece_date] [datetime] NULL,
	[issued_at] [varchar](50) NULL,
	[pay_at] [varchar](50) NULL,
	[rece_no] [varchar](50) NULL,
	[date3] [datetime] NULL,
	[work_div] [varchar](50) NULL,
	[m_s] [varchar](50) NULL,
	[auc_held_on] [datetime] NULL,
	[sanc_vide_no] [varchar](50) NULL,
	[date4] [datetime] NULL,
	[effe_from] [varchar](50) NULL,
	[lot_no] [varchar](50) NULL,
	[stack_no] [varchar](50) NULL,
	[des_spp] [varchar](50) NULL,
	[des_size] [varchar](50) NULL,
	[no] [varchar](50) NULL,
	[vol] [varchar](50) NULL,
	[rate] [decimal](18, 3) NULL,
	[amt] [decimal](18, 3) NULL,
	[pay_type] [varchar](50) NULL,
	[discount] [decimal](18, 2) NULL,
	[less_dis] [decimal](18, 2) NULL,
	[tds] [decimal](18, 2) NULL,
	[vat] [decimal](18, 2) NULL,
	[market_fee] [decimal](18, 2) NULL,
	[net_amt] [decimal](18, 2) NULL,
	[floor_rate] [decimal](18, 2) NULL,
	[discount1] [decimal](18, 2) NULL,
	[less_dis1] [decimal](18, 2) NULL,
	[tds1] [decimal](18, 2) NULL,
	[vat1] [decimal](18, 2) NULL,
	[market_fee1] [decimal](18, 2) NULL,
	[factor] [varchar](50) NULL,
	[dep] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [forest_hsd].[receipt_book]    Script Date: 05/20/2013 15:10:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [receipt_book](
	[code] [int] IDENTITY(1,1) NOT NULL,
	[no] [varchar](50) NULL,
	[book_no] [varchar](50) NULL,
	[purchaser_name] [varchar](50) NULL,
	[rs] [decimal](18, 3) NULL,
	[pro_emd] [varchar](50) NULL,
	[pay_type] [varchar](50) NULL,
	[pay_no] [varchar](50) NULL,
	[date] [datetime] NULL,
	[payable] [varchar](50) NULL,
	[rec_date] [datetime] NULL,
	[dep] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[rawana_challan]    Script Date: 05/20/2013 15:10:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[rawana_challan](
	[code] [int] IDENTITY(1,1) NOT NULL,
	[no] [int] NULL,
	[book_no] [int] NULL,
	[time] [varchar](50) NULL,
	[rel_order] [varchar](50) NULL,
	[name_add] [varchar](500) NULL,
	[veh_kind_no] [varchar](50) NULL,
	[name_driver] [varchar](50) NULL,
	[place_to_consig] [varchar](50) NULL,
	[for_trans] [varchar](50) NULL,
	[hammer_mark] [varchar](50) NULL,
	[name_div] [varchar](50) NULL,
	[date_auc] [datetime] NULL,
	[lot_no] [varchar](50) NULL,
	[stack_no] [varchar](50) NULL,
	[species] [varchar](50) NULL,
	[size] [varchar](100) NULL,
	[no_2] [int] NULL,
	[vol] [decimal](18, 3) NULL,
	[amt] [decimal](18, 2) NULL,
	[date] [datetime] NULL,
	[kind] [varchar](50) NULL,
	[dep] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [forest_hsd].[kind]    Script Date: 05/20/2013 15:10:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [kind](
	[code] [int] IDENTITY(1,1) NOT NULL,
	[kind] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [forest_hsd].[grade]    Script Date: 05/20/2013 15:10:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [grade](
	[code] [int] IDENTITY(1,1) NOT NULL,
	[grade] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[gate_pass]    Script Date: 05/20/2013 15:10:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[gate_pass](
	[challan_no] [varchar](50) NULL,
	[date] [datetime] NULL,
	[sno] [int] NULL,
	[rel_order] [varchar](50) NULL,
	[name_add] [varchar](500) NULL,
	[veh_no] [varchar](50) NULL,
	[name_driver] [varchar](50) NULL,
	[name_div] [varchar](50) NULL,
	[date_auc] [datetime] NULL,
	[spec] [varchar](50) NULL,
	[name_kind] [varchar](50) NULL,
	[size] [int] NULL,
	[no] [int] NULL,
	[vol] [varchar](50) NULL,
	[amt] [decimal](18, 2) NULL,
	[code] [int] IDENTITY(1,1) NOT NULL,
	[dep] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [forest_hsd].[factor]    Script Date: 05/20/2013 15:10:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [factor](
	[code] [int] IDENTITY(1,1) NOT NULL,
	[factor] [varchar](50) NULL,
	[val] [decimal](18, 5) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[division]    Script Date: 05/20/2013 15:10:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[division](
	[code] [int] IDENTITY(1,1) NOT NULL,
	[div] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[auc_sale_list]    Script Date: 05/20/2013 15:10:54 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[auc_sale_list](
	[code] [int] IDENTITY(1,1) NOT NULL,
	[lot_no] [varchar](50) NULL,
	[stack] [varchar](50) NULL,
	[size] [varchar](50) NULL,
	[no] [varchar](50) NULL,
	[vol] [varchar](50) NULL,
	[ctt] [varchar](50) NULL,
	[remarks] [varchar](50) NULL,
	[name_party] [varchar](50) NULL,
	[challan_no] [varchar](50) NULL,
	[date] [datetime] NULL,
	[bid] [varchar](50) NULL,
	[dep] [varchar](50) NULL
) ON [PRIMARY]
GO
SET ANSI_PADDING OFF
GO
