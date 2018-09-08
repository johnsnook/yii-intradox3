CREATE TABLE id2.project (
  id SERIAL,
  project VARCHAR(50),
  is_archived SMALLINT DEFAULT 0,
  is_restricted SMALLINT DEFAULT 0 NOT NULL,
  CONSTRAINT aaaaapdms_project_pk PRIMARY KEY(id)
) ;

/* Data for the 'id2.project' table  (Records 1 - 302) */

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (1, E'Corco', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (5, E'Shell Crop Protection', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (6, E'A Test Project', 1, 1);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (7, E'Olin McIntosh', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (9, E'Crab Orchard', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (10, E'Shell Oil Del Amo', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (11, E'AIG South Jersey Gas', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (12, E'Husch & Eppenberger Litigation-New York', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (22, E'Shell Sturbridge', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (23, E'Charnock Technical Advisory Group (CTAG)', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (24, E'Shell Southington', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (25, E'Confidential Wood Treatment', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (26, E'Olin Personal Injury', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (27, E'Olin Geigy', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (28, E'Limavady', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (29, E'GA Pacific - Crossett', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (30, E'Anniston Public', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (31, E'Olin - Big D', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (32, E'McKesson', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (33, E'Shell Wickens', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (34, E'Manville Creosote Site', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (35, E'Shell PG&E', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (36, E'Intertrade', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (37, E'Tate & Lyle', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (38, E'CORCO Free Product', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (39, E'Vicksburg Chemical', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (40, E'Shell Patrick Bayou', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (41, E'Solvent Chemical', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (43, E'Amvac Fairburn', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (44, E'Berry''s Creek', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (45, E'Hawaii Strategic Planning', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (46, E'Southwire 2006', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (47, E'Simplot - Don Plant', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (48, E'XOM: Pelham Manor', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (49, E'Cass Lake', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (50, E'Southern Union- Tiverton', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (51, E'Beazer: Paige v Dura-Wood', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (52, E'City of Fayetteville', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (53, E'Central Chemical', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (54, E'XOM: Greenpoint', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (55, E'State Water Plan', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (56, E'Carolina Health Care', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (57, E'XOM: Bayonne', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (58, E'XOM: Bayway', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (59, E'XOM: Mahopac Forensics', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (60, E'XOM: Spring Valley', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (61, E'XOM: Uniondale', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (62, E'Hercules K & S', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (63, E'Storybooks', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (64, E'Lovejoy', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (65, E'Port', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (66, E'Bayer - Factory Lane Site', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (67, E'US Air Force', 0, 1);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (68, E'Navy - Bethpage', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (69, E'Bayer Portao', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (71, E'Yosemite', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (72, E'PSI-Pyrotechnic Specialties, Inc.', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (73, E'Bayer - Sao Leopoldo', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (74, E'Olin Corp.- RFS Ecusta, Inc', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (75, E'XOM: Campbell Hall Forensics', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (76, E'London Olympics-Remedial Strategy Review', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (77, E'Oxy Riverside', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (78, E'Hercules- Brunswick Off-Site', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (83, E'Demo', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (84, E'NewFields Presidents Monthly Calls', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (85, E'NewFields Board and Committee Chairs', 0, 1);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (86, E'XOM: GreenPoint (Dom''s Historical Documents)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (87, E'Syngenta - Landfill', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (88, E'NewFields Webinar', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (89, E'Garza v. Allied', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (90, E'BASF - Passaic River', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (91, E'Bayer FLS Internal', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (92, E'Route 44 Investment Trust (0558-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (93, E'Spalding County WWTP', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (94, E'Bofors', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (95, NULL, 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (96, E'Bayer - Woodbine', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (97, E'Red Bluff Diversion Dam', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (98, E'McAllen Texas (Hidalgo County)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (99, E'Saudi Arabia', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (100, E'Motiva-Delaware City Refinery', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (101, E'AWTC', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (102, E'Gowanus Canal', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (103, E'Bayer - Sao Pedro', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (104, E'Olin - Morgan Hill', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (105, E'St Johns River Water Management District', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (106, E'Freeport', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (107, E'McGee Texarkana (0425-005-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (108, E'Tronox ENSR Wilmington, NC (0425-011-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (109, E'Tronox Columbus MS (0425-013-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (110, E'Tronox Texarkana (0425-015-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (111, E'Duke Shelbyville (0444-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (112, E'Duke Energy East End (0444-003-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (113, E'Duke Energy Jeffersonville (0444-005-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (114, E'GEI Newburyport (0455-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (115, E'GEI National Grid Marblehead MGP (0455-002-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (116, E'National Grid Kingsley ( 0455-005-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (117, E'FPEC Newark (0476-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (118, E'Hillside MGP New York (0486-004-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (119, E'Keyspan Staten Island (0486-012-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (120, E'Keyspan PT Jeff Horton Sphere ( 0486-022-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (121, E'Lynbrook Hortonsphere (0486-022-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (122, E'Wakefield MGP (0811-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (123, E'Michigan Ave (0853-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (124, E'TRC Brookline Place ( 0881-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (125, E'Quality Service Station AIG (0901-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (126, E'Rosen Property (0974-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (127, E'Killburn Australia (1085-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (128, E'Lessard (1136-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (129, E'Wayland Cleaners (1158-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (130, E'Essex Park Drive (1172-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (131, E'First Energy (1253-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (132, E'First Energy (1253-002-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (133, E'Wind River (1416-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (134, E'Pitney Bowes 23 Barry Pl. (1452-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (135, E'New Albertson- Motherbrook (1484-001-850', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (136, E'Ashland (0312-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (137, E'Ashland Lakefront (0312-001-800)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (138, E'Racine (0323-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (139, E'Racine (0323-002-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (140, E'Dominion (0404-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (141, E'Blank Rome (0414-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (142, E'Kerr McGee Wilmington, NC (0425-004-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (143, E'NavyDerecktor Shipyard Tetra Tech (0005-034-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (144, E'Portsmouth Naval Station (0005-037-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (145, E'Navy Cutler ME (0005-040-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (146, E'Barrie Park  (0495-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (147, E'Bangor, ME', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (148, E'2010 Partners'' Meeting', 1, 1);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (149, E'Cabot Kopper', 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (150, E'Rentokil - Virginia Properties', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (151, E'Shell - Berre l''Etang', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (152, E'AVX - Myrtle Beach', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (153, E'TVA Kingston', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (154, E'Brazil Clients', 0, 1);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (155, E'National Lead - Depew', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (156, E'Fracking', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (157, E'Champaign MGP', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (158, E'Plant Scherer', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (159, E'Olin Portfolio', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (160, E'GE Maria das Gracas', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (161, E'NewFields Brasil-Documents', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (162, E'Lorco - Elizabeth', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (163, E'Lorco - Camden', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (164, E'Lorco - Aberdeen', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (165, E'Lorco - Old Bridge', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (166, E'Cooper - Santo Amaro', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (167, E'Former ASARCO Smelter', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (168, E'Gulf of Mexico Research Initiative', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (169, E'Freeport - Kay County', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (170, E'PRJ', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (171, E'Lilly Brazil', 0, 1);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (172, E'Bankruptcy ELP- MDG', 0, 1);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (173, E'CTS', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (174, E'GE Energy - NiterÃ³i', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (175, E'XOM-Matter 2011-000459 Chevron Texaco (Greenpoint)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (176, E'GES-Baltimore (0076-044-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (177, E'XOM-Fairmont (0076-068-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (178, E'NewFields Brasil Invoices', 0, 1);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (179, E'NewFields Brasil Small Projects', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (180, E'M2Green - Missoula Mill', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (181, E'Hazard Kentucky Coal Tar (1339-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (182, E'Ward Transformers (1338-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (183, E'McKesson (0812-001-150)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (184, E'Ecuador Statistics', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (185, E'Everglades (0645-015-900)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (186, E'Somerville Site (0759-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (187, E'NiSource - Majorsville (0589-002-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (188, E'Parsons-Saw Mill Parkway', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (189, E'XOM-Hong Kong (0076-113-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (190, E'XOM-Fairmont (0076-178-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (191, E'DuPont-Peters Cartridge (0169-006-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (192, E'Valero Refinery (0438-004-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (193, E'Valero - Santa Fe Spring Refinery (0438-005-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (194, E'National Grid-Fulton (0455-006-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (195, E'National Grid-Newport (0455-008-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (196, E'GEI-Nassau Gas Works (0486-002-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (197, E'GEI-Key Span Bay Shore (0486-013-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (198, E'GEI-KeySpan Brentwood (0486-015-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (199, E'GEI-Rockaway Park', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (200, E'Pondre River-Fort Collins (0514-001-400)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (201, E'Clipper Tobago (0148-006-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (202, E'NOAA Deepwater', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (203, E'Delaware City Refinery (0438-008-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (204, E'Delta-Eden Prairie (0088-024-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (205, E'US Coast Guard - DuPont Road', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (206, E'Encana (850.0200.000)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (207, E'ENSR-Majorsville (0589-002-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (208, E'Erie Petroleum (1446-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (209, E'XOM-Allendale (850.0072.000)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (210, E'XOM-Altona Pipeline (0076-111-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (211, E'XOM-17 EQN (0076-062-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (212, E'XOM-Eagle Works', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (213, E'XOM-Bayway Caverns', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (214, E'XOM-Corpus Christi', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (215, E'BP-Milford MI (850.0789.000)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (216, E'Chevron-Brazil (850.0079.000)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (217, E'Chevron-API (0624-004-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (218, E'Chevron-Great American (850.0770.000)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (219, E'Chevron-Kuwait (0013-028-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (220, E'Chevron-NDA (850.0075.000)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (221, E'Chevron-Pasciuto vs Shriners', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (222, E'Citgo-East Chicago (0081-003-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (223, E'ConocoPhillips-Ecuador (850.0067.000)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (224, E'Kostas N.', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (225, E'Cosco Busan (850.0405.001)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (226, E'XOM-Burien WA (0076-036-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (227, E'XOM-Greenpoint (0076-037-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (228, E'XOM-West Pico Blvd', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (229, E'XOM-Baton Rouge', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (230, E'XOM-Thousand Oaks', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (231, E'Langan-Cherry Hill (0430-002-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (232, E'Langan-Sunoco Eagle Point', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (233, E'Lessard-Plymouth MA', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (234, E'Lessard-Radio Oil (Albany St. Worcester MA)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (235, E'Lessard-Adams MA', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (236, E'Ninyo and Moore - Rancho Santa Fe', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (237, E'XOM-Ogdensburg NY (0076-040-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (238, E'San Diego-Campbell Shipyard (0488-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (239, E'Jankovich-Barge Tyler J Oil Spill (850.0598.000)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (240, E'Dominion-McAllen Texas', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (241, E'AIG-Boston Properties (0288-006-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (242, E'AIG-Tiverton RI H.S. (0288-005-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (243, E'Arcadis-Mid Valley Pipeline (0071-020-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (244, E'BP-Dearborn Heights (0034-025-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (245, E'BP-Detroit MI SS#5679 (0034-021-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (246, E'BP-East Rochester (850.0046.001)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (247, E'BP-Fort Wayne (850.0029.000)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (248, E'BP-Kingsmill (850.0142.000)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (249, E'BP-Lomax (850.0048.000)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (250, E'BP-Iselin NJ (0034-017-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (251, E'BP-Louisiana (0034-028-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (252, E'BP-Lysander (850.0047.000)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (253, E'Angola-Fish Study', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (254, E'Jersey City Landfill (850.0207.000)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (255, E'XOM-Englewood NJ Station 3-5165 (850.0183.000)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (256, E'XOM-Dos Palos CA (0076-117-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (257, E'XOM-Jackson Heights SS#11988 17-HEX (0076-140-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (258, E'XOM-Libya (0076-161-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (259, E'XOM-Madagascar (0076-155-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (260, E'XOM-Newport Austraia (1310-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (261, E'XOM-99GOR (0076-168-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (262, E'XOM-Westfield NJ SS (850.0066.000)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (263, E'Getty-East Windsor (0841-006-400)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (264, E'XOM-GES Chaplin CT (0076-119-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (265, E'Gloversville (0071-014-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (266, E'GSI-Jennings Oil Field (0013-025-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (267, E'Navy Davisville', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (268, E'Honeywell-Phoenix AR (0012-016-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (269, E'Keystone Shipping (1400-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (270, E'XOM-M8 Pipeline (0076-179-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (271, E'XOM-Staten Island NY (0076-127-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (272, E'MV-Capitola (850.0719.000)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (273, E'GSI-MTD Indianola MS (1153-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (274, E'test', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (275, E'Portland, OR  (0219-008-900)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (276, E'San Diego-NASSCO (850.0287.000)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (277, E'Sunoco-Barnsdall (0071-018-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (278, E'Honeywell Detroit Coke (0012-013-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (279, E'AECOM_Brindisi,Italy (0056-128-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (280, E'Akyem', 0, 1);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (281, E'CSN - Volta Grande IV', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (282, E'Southwire_NSA Site (0017-006-200)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (283, E'Centredale (0019-018-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (284, E'Ledbetter', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (285, E'Holyoke MGP Site- NorthEast Utilities', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (286, E'Tiverton (1003-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (287, E'Bunzl', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (288, E'Sasol', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (289, E'Magnesium Elektron', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (290, E'M/V Greta (0973-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (291, E'Barrick Golden Sunlight Mine', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (292, E'Regent Mine', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (293, E'Holliday Sand & Gravel', 0, 1);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (294, E'Caldwell Canyon', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (295, NULL, 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (296, NULL, 1, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (297, E'WA-Ecology', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (298, E'Beezer Alexandra (0121-005-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (299, E'Alexander Termite and Pest Control', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (300, E'GEI Schenectady Clinton St. FMGP (0455-009-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (301, E'Motiva (0056-058-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (302, E'URS/USS Gary Works, IN (0939-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (303, E'Detroit Renewable Power', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (304, E'Chattanooga Creek NAPL (0921-001-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (305, E'NYSEG McMaster MGP (0930-003-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (306, E'Ash Grove', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (307, E'Berry Creek', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (308, E'GEI Newtown Creek, Verizon Parcel', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (309, E'NASCO Silver Gate (0488-002-850)', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (310, E'Port of San Francisco', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (311, E'Castleford', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (312, E'Bayer Belford Roxo', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (313, E'GA Power LCP', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (314, E'Lorco Elizabeth Terminal', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (315, E'Lorco Elkton Terminal', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (316, E'Lorco Camden Terminal', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (317, E'GPC Plant Mitchell', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (318, E'North Birmingham', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (319, E'Duke Energy Cape Fear', 0, 1);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (320, E'Target Range Sewer and Water District', 0, 0);

INSERT INTO id2.project ("id", "project", "is_archived", "is_restricted")
VALUES (321, E'XOM-Yemen (0076-099-850)', 0, 0);