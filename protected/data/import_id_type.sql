CREATE TABLE id2.type (
  id SERIAL,
  projectid INTEGER,
  type VARCHAR(255),
  CONSTRAINT aaaaapdms_type_pk PRIMARY KEY(id)
) ;

/* Data for the 'id2.type' table  (Records 1 - 500) */

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1, 1, E'FAX');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (26, 5, E'REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (27, 5, E'CDROM');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (4, 5, E'FAX');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (5, 5, E'EMAIL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (6, 5, E'MEETING MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (8, 5, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (7, 5, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (9, 5, E'CONTRACTS/BIDS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (11, 5, E'FIGURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (10, 5, E'LETTER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (12, 5, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (71, 7, E'MINUTES / AGENDA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (56, 7, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (19, 5, E'MAPS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (20, 5, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (58, 7, E'BROCHURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (21, 5, E'GUIDANCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (22, 5, E'LAW');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (23, 5, E'ARTICLE / REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (24, 5, E'VARIOUS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (25, 1, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (47, 1, E'MANUAL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (2, 1, E'LETTER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (28, 1, E'FORM');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (29, 1, E'EMAIL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (30, 7, E'LETTER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (31, 7, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (32, 7, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (33, 7, E'EMAIL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (34, 7, E'FORM');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (37, 7, E'INDEX');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (35, 7, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (36, 7, E'INVOICE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (38, 7, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (39, 7, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (40, 7, E'NEWS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (41, 7, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (42, 7, E'CD');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (43, 1, E'PURCHASE ORDERS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (44, 1, E'FIGURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (45, 1, E'MAP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (3, 1, E'MINUTES/AGENDAS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (53, 1, E'CONTRACT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (48, 1, E'REGULATIONS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (49, 1, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (50, 1, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (51, 1, E'PHOTOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (52, 1, E'WEB PAGE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (46, 1, E'NEWS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (54, 1, E'BROCHURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (13, 6, E'Design');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (14, 6, E'Requirements');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (15, 6, E'Documentation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (18, 6, E'Invoice');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (59, 7, E'DEPOSITION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (60, 7, E'GIS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (61, 10, E'CONTRACT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (68, 7, E'PHOTOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (62, 10, E'ORDER / DECISION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (63, 10, E'INDEX');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (64, 10, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (65, 10, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (66, 10, E'TECHNICAL MEMORANDUM');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (67, 10, E'FIGURES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (69, 10, E'ARTICLE / REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (70, 10, E'GUIDANCE / REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (55, 7, E'GUIDANCE/REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (90, 10, E'FACT SHEETS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (73, 9, E'MINUTES / AGENDA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (74, 9, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (75, 9, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (76, 9, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (77, 9, E'CONTRACT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (78, 9, E'BRIEFINGS / PRESENTATIONS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (72, 9, E'COMMENTS / RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (79, 9, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (80, 9, E'REFERENCES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (81, 9, E'GUIDANCE/REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (83, 9, E'EXHIBITS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (84, 9, E'FIGURES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (85, 9, E'COURT DOCUMENTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (86, 9, E'SCHEDULE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (87, 9, E'PROGRESS REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (88, 10, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (89, 10, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (91, 9, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (92, 9, E'INDEX');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (93, 7, E'CV');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (94, 7, E'WEB PAGE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (102, 12, E'PHOTOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (95, 12, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (96, 12, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (97, 12, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (98, 12, E'PETITION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (99, 12, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (100, 12, E'PERMIT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (101, 12, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (103, 12, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (104, 12, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (105, 12, E'MAP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (106, 12, E'OPERATIONS MANUAL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (108, 12, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (109, 12, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (110, 12, E'MEETING MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (111, 12, E'FORMS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (112, 12, E'CONTRACT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (113, 10, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (114, 12, E'INVOICE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (115, 5, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (116, 10, E'SPREADSHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (117, 12, E'INDEX');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (118, 10, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (119, 10, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (120, 10, E'MEETING MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (121, 10, E'AGENDA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (122, 12, E'EXPERT REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (123, 12, E'DEPOSITION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (124, 7, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (125, 9, E'REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (126, 7, E'EXHIBITS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (127, 7, E'STANDARD');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (128, 12, E'GUIDANCE/REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (129, 22, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (130, 22, E'EXPERT REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (131, 22, E'LOGS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (132, 22, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (133, 9, E'MAP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (134, 9, E'CD');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (135, 9, E'PROPOSAL/RFP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (136, 9, E'PHOTOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (137, 9, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (138, 9, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (139, 9, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (140, 9, E'FACT SHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (141, 9, E'WEB SITE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (142, 22, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (143, 23, E'Court Document');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (144, 9, E'FORM');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (145, 22, E'DEPOSITION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (146, 24, E'REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (147, 24, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (148, 24, E'CASE STUDY');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (150, 24, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (151, 25, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (149, 25, E'E-mail');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (152, 25, E'SITE LISTING');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (153, 25, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (154, 25, E'CITATIONS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (155, 25, E'NEWS ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (156, 25, E'MAP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (157, 25, E'EVALUATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (158, 25, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (159, 25, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (160, 25, E'PERMIT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (161, 25, E'NOTICE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (166, 25, E'PRESS RELEASE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (163, 25, E'FACT SHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (164, 7, E'Power Point Presentation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (165, 25, E'BORING LOGS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (162, 25, E'COURT ORDER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (167, 24, E'FACT SHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (168, 24, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (169, 25, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (170, 25, E'MEETING MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (171, 25, E'AGREEMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (172, 25, E'CD');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (173, 11, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (174, 26, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (175, 26, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (176, 26, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (177, 26, E'DEPOSITION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (178, 26, E'MEDICAL RECORDS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (179, 26, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (180, 7, E'COURT TRANSCRIPT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (181, 26, E'COURT FILING');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (182, 7, E'MEDICAL RECORDS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (183, 27, E'SUPERFUND DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (185, 27, E'MAPS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (184, 27, E'DOCKET DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (186, 27, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (187, 27, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (188, 27, E'GIS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (189, 27, E'PHOTOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (190, 27, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (191, 27, E'GUIDANCE/REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (192, 27, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (193, 27, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (194, 27, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (195, 27, E'FORMS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (196, 27, E'PRODUCT LABELS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (198, 27, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (197, 27, E'CONTRACT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (199, 27, E'EXPERT REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (200, 27, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (201, 28, E'CONTRACT / AGREEMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (202, 28, E'NEWS ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (203, 28, E'JOURNAL ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (204, 28, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (205, 28, E'GUIDANCE/REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (206, 28, E'FORM');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (207, 28, E'FIGURES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (208, 28, E'MINUTES / AGENDA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (209, 28, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (210, 28, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (211, 28, E'INVOICES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (212, 28, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (213, 28, E'PERMIT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (214, 28, E'WEB PAGE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (215, 28, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (216, 29, E'DOCKET DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (217, 29, E'TAX RECORDS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (218, 29, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (219, 29, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (220, 29, E'MAP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (236, 31, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (245, 7, E'CAR');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (224, 27, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (57, 7, E'FIGURES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (237, 31, E'SUPERFUND DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (239, 7, E'PERMIT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (240, 1, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (241, 7, E'WELL LOGS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (243, 30, E'OPS - Solutia documents');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (233, 30, E'PR - EPA communications');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (242, 30, E'OPS - Presentations');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (246, 7, E'MANUAL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (232, 30, E'PR - Health information');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (230, 30, E'PR - Petition sheets');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (228, 30, E'PR - Photos/Video');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (226, 30, E'PR - Project information');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (221, 30, E'PR - News');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (222, 30, E'PR - Meetings, ads, press releases');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (223, 30, E'PR - Newsletters');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (225, 30, E'PR - Community contacts');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (247, 32, E'LETTER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (248, 32, E'FACT SHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (251, 32, E'FIGURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (244, 30, E'OPS - Work plans / Bid documents');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (252, 30, E'OPS - Budgets and Schedules');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (253, 32, E'RESPONSE/COMMENTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (254, 32, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (250, 32, E'SITE INVESTIGATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (255, 32, E'MONITORING REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (256, 32, E'DESIGN REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (257, 32, E'CONSTRUCTION REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (258, 32, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (259, 32, E'INDEX');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (260, 32, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (249, 32, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (261, 32, E'EXPERT REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (262, 32, E'AGENDA/MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (263, 7, E'EXPERT REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (264, 32, E'NOTICES/INSPECTIONS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (265, 32, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (266, 30, E'OPS - Weekly Reports');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (267, 30, E'OPS - Property Completion Reports');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (268, 30, E'OPS - Property Field Forms');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (235, 30, E'OPS - AOC & Public Comments');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (234, 30, E'OPS - Technical Committee Information');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (269, 30, E'OPS - Property Sampling/Cleanup Photos');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (270, 33, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (271, 33, E'Letter');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (272, 33, E'Court document');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (274, 33, E'Article');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (276, 32, E'CD');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (277, 34, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (278, 34, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (279, 34, E'Letter');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (280, 34, E'Newspaper Article');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (281, 7, E'Calculations');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (282, 30, E'PR - Resident Communication Log');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (284, 34, E'Journal article');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (285, 34, E'Information brief');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (286, 34, E'Web page');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (287, 34, E'Factsheet');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (288, 30, E'OPS - Quarterly Progress Reports');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (289, 32, E'ROD');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (290, 34, E'GUIDANCE/REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (291, 34, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (292, 34, E'Record of Decision (ROD)');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (293, 36, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (294, 36, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (295, 36, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (296, 36, E'CONSTRUCTION REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (297, 34, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (298, 34, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (299, 34, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (300, 36, E'PERMIT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (301, 36, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (302, 36, E'INSPECTION REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (303, 36, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (304, 36, E'GUIDANCE/REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (306, 36, E'BROCHURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (305, 36, E'LETTER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (307, 36, E'INDEX');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (308, 36, E'EMAIL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (309, 36, E'WEB PAGE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (311, 36, E'REFERENCE/ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (312, 36, E'FACT SHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (313, 36, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (315, 34, E'FIGURES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (316, 31, E'LETTER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (317, 32, E'EMAIL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (318, 32, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (320, 31, E'FIGURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (321, 31, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (323, 31, E'MINUTES/AGENDA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (314, 31, E'NEWS ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (324, 31, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (325, 31, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (326, 31, E'TRANSCRIPT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (329, 33, E'Email');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (330, 32, E'INSTRUCTION SHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (331, 34, E'Newsletter');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (332, 34, E'Press release');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (333, 34, E'DOCKET DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (334, 34, E'Index');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (335, 34, E'PHOTO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (283, 34, E'Minutes/Agenda');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (336, 34, E'Deposition');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (338, 34, E'Contract');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (339, 34, E'Insurance Policy');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (340, 34, E'Notes');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (341, 32, E'SPREADSHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (342, 32, E'INCIDENT REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (343, 31, E'METHOD');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (344, 36, E'APPLICATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (345, 33, E'GUIDANCE/REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (347, 36, E'MINUTES/AGENDA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (348, 30, E'OPS - Potential Disposal Areas Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (349, 36, E'FAX');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (350, 36, E'FIGURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (351, 36, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (352, 36, E'REQUISITION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (353, 36, E'RISK ASSESSMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (354, 39, E'LETTER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (355, 39, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (357, 39, E'MINUTES/AGENDA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (358, 39, E'WEBSITE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (359, 39, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (360, 39, E'INDEX');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (361, 39, E'NEWS ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (356, 39, E'NEWS RELEASE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (362, 39, E'NEWSLETTER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (363, 31, E'PHOTO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (364, 31, E'RECORD');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (367, 35, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (368, 35, E'E-Mail');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (369, 32, E'CONTRACT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (370, 36, E'CD');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (346, 36, E'INVOICE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (371, 37, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (372, 37, E'GUIDANCE/REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (373, 37, E'INSPECTION REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (374, 37, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (375, 37, E'LETTER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (376, 37, E'PERMIT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (377, 37, E'FIGURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (378, 32, E'PROPOSAL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (380, 32, E'INVOICE / PURCHASE ORDER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (382, 37, E'MINUTES/AGENDA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (384, 37, E'SAFETY CHECKLIST');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (385, 37, E'SIGNED STATEMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (386, 37, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (387, 37, E'MSDS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (388, 37, E'INCIDENT REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (389, 37, E'NOTICE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (391, 37, E'CITATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (392, 37, E'INVOICE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (393, 32, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (238, 31, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (394, 31, E'STANDARD OPERATING PRODECURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (395, 31, E'QUALITY STANDARDS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (397, 31, E'LAW');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (398, 40, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (399, 40, E'Newspaper Article');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (401, 40, E'Reports');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (403, 41, E'EXPERT REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (404, 41, E'FIGURES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (405, 41, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (406, 41, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (407, 41, E'GIS FILES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (408, 41, E'SITE INVESTIGATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (409, 41, E'Superfund document');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (410, 41, E'PHOTO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (412, 41, E'GUIDANCE/REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (413, 41, E'FACT SHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (365, 31, E'REQUISITION / INVOICE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (327, 31, E'INDEX');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (414, 41, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (415, 41, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (416, 41, E'CONSTRUCTION REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (417, 41, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (418, 43, E'NEWS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (419, 43, E'REFERENCE/ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (420, 43, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (421, 37, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (422, 31, E'FACT SHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (423, 41, E'INDEX');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (424, 44, E'SUPERFUND DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (425, 44, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (426, 44, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (427, 44, E'NEWS ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (428, 44, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (429, 44, E'FEDERAL REGISTER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (430, 44, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (431, 44, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (432, 43, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (433, 40, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (434, 40, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (435, 40, E'PROPOSAL/BID');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (436, 40, E'Agenda/Minutes');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (437, 40, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (400, 40, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (438, 40, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (439, 40, E'FIGURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (440, 40, E'RECORD OF DECISION (ROD)');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (441, 40, E'GUIDANCE/REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (442, 40, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (383, 37, E'STANDARD OPERATING PRODECURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (443, 45, E'REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (444, 45, E'LAW');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (445, 45, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (446, 45, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (447, 45, E'PROPOSAL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (448, 45, E'GRAPHIC');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (449, 45, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (450, 45, E'WEB PAGE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (451, 45, E'WHITE PAPER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (452, 45, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (453, 45, E'PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (454, 44, E'PROPOSAL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (455, 45, E'BUDGET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (456, 47, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (457, 47, E'AGENDA/MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (458, 47, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (459, 47, E'MONITORING REPORTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (460, 47, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (461, 46, E'Memo');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (462, 47, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (463, 47, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (464, 46, E'General correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (465, 47, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (466, 47, E'PHOTO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (467, 46, E'SOP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (468, 46, E'Sampling Plan');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (469, 46, E'Laboratory report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (470, 46, E'Phase II report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (471, 47, E'FIGURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (472, 46, E'Action Plan');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (473, 46, E'Phase I report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (474, 46, E'PRASA Manifest');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (475, 46, E'Compliance report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (476, 46, E'PowerPoint Presentation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (477, 46, E'Site inspection report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (478, 46, E'Project detail report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (479, 46, E'Deposition');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (480, 46, E'Analytical Data Table');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (481, 43, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (482, 32, E'NEWS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (484, 32, E'PERMITS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (485, 50, E'General Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (486, 50, E'Site Investigation Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (487, 50, E'Site Investigation Work Plan');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (488, 50, E'Analytical Results');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (490, 52, E'CONTRACT/BID');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (491, 33, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (492, 33, E'EXPERT REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (493, 31, E'EXPERT REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (494, 37, E'CORPORATE DOCUMENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (495, 50, E'Map');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (496, 50, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (497, 37, E'NEWS ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (498, 53, E'REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (499, 53, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (500, 53, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (501, 53, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (502, 53, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (503, 53, E'LETTER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (504, 53, E'FIGURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (505, 53, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (506, 53, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (507, 43, E'TV Coverage');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (508, 43, E'Letter');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (509, 53, E'INVESTIGATION(S)');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (510, 53, E'COURT DOCUMENTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (511, 53, E'MEETING INFO.');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (366, 37, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (512, 53, E'NEWSPAPER ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (514, 33, E'MAP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (515, 33, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (273, 33, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (516, 53, E'COSTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (517, 55, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (518, 55, E'ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (519, 55, E'PLAN DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (520, 55, E'DISCUSSION MATERIALS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (521, 55, E'SCHEDULE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (522, 55, E'FACT SHEET');


/* Data for the 'id2.type' table  (Records 501 - 1000) */

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (523, 5, E'OPERATION MANUAL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (524, 5, E'DESIGN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (526, 5, E'SURVEY');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (527, 5, E'RISK ASSESSMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (528, 1, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (529, 56, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (530, 56, E'FIGURES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (531, 1, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (532, 32, E'PHOTO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (534, 30, E'OPS - Project Memoranda');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (535, 43, E'FORM');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (536, 43, E'MSDS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (537, 43, E'FACT SHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (538, 43, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (539, 43, E'SOP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (540, 43, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (541, 43, E'INVOICE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (542, 43, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (543, 43, E'FIGURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (544, 43, E'PERMIT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (545, 43, E'GUIDANCE/REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (546, 30, E'EPA - Database Download');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (549, 40, E'LETTER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (550, 62, E'Health Consultation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (551, 62, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (553, 43, E'PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (554, 32, E'EVS Related File');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (555, 37, E'SOUND DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (556, 32, E'FIELD LOGS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (557, 41, E'MONITORING REPORTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (558, 64, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (559, 64, E'Guidance');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (560, 64, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (561, 64, E'Figure');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (562, 66, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (564, 66, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (565, 66, E'GUIDANCE/REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (567, 66, E'TEST METHOD');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (568, 66, E'FACT SHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (569, 66, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (570, 62, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (571, 66, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (572, 66, E'LEGAL DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (573, 66, E'FIGURES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (574, 66, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (575, 64, E'Photos');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (576, 66, E'NEWS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (578, 66, E'SCHEDULE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (579, 66, E'INDEX');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (580, 66, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (581, 66, E'AGENDA/MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (582, 66, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (583, 66, E'FORMS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (577, 66, E'COST DOCUMENTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (584, 66, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (585, 66, E'NJDEP SUBMISSION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (586, 66, E'PERMITTING');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (587, 66, E'PHOTOGRAPHS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (588, 66, E'MEMORANDUM');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (589, 66, E'SPECIFICATIONS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (590, 37, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (591, 40, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (592, 66, E'PROPOSAL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (593, 37, E'CD');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (594, 41, E'RESUME');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (595, 37, E'EXPERT REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (596, 66, E'CERTIFICATE OF INSURANCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (597, 66, E'STRATEGY MEETINGS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (599, 67, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (600, 67, E'FORM');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (601, 67, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (602, 67, E'LETTER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (603, 67, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (604, 67, E'REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (605, 68, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (606, 68, E'Progress Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (607, 68, E'Work Plan');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (608, 68, E'News');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (609, 68, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (610, 68, E'Record of Decision');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (611, 68, E'Minutes/Agenda');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (612, 67, E'AGENDA/MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (613, 69, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (614, 69, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (615, 69, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (616, 67, E'FIGURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (617, 67, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (618, 69, E'PROPOSAL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (619, 67, E'COURT DOCUMENTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (620, 68, E'Letter');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (621, 68, E'Fact Sheet/Notice');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (622, 67, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (623, 69, E'AGENDA/MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (624, 69, E'PHOTOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (625, 69, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (626, 69, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (627, 69, E'LEGAL DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (629, 40, E'PERMIT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (630, 40, E'Field Logs and Photos');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (634, 71, E'STUDY');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (635, 5, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (636, 69, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (637, 68, E'Court document');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (640, 27, E'DEED/EASEMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (641, 74, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (642, 74, E'SITE ASSESSMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (643, 74, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (644, 74, E'LETTER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (645, 74, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (646, 74, E'FIGURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (648, 74, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (628, 27, E'PROGRESS REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (631, 27, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (632, 27, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (633, 27, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (639, 27, E'EXPERT REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (651, 76, E'IMAGE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (650, 76, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (649, 76, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (652, 78, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (653, 78, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (654, 78, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (655, 78, E'MEETING INFO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (656, 78, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (658, 78, E'REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (659, 78, E'NEWSPAPER ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (660, 73, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (661, 73, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (662, 73, E'SITE INVESTIGATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (663, 73, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (665, 73, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (666, 73, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (667, 73, E'FIGURES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (668, 69, E'FIGURES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (669, 83, E'letter');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (672, 77, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (673, 77, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (670, 77, E'Data Compilation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (671, 77, E'Lab Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (675, 77, E'Image');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (676, 77, E'Webpage');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (677, 77, E'Presentation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (678, 77, E'Timeline');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (679, 77, E'Log book');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (680, 77, E'Court Document');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (681, 77, E'Reference');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (682, 85, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (683, 85, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (684, 85, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (685, 77, E'Guidance');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (686, 27, E'FIGURES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (687, 27, E'NEWS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (690, 87, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (689, 87, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (692, 87, E'BORING LOGS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (693, 27, E'INDEX');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (691, 87, E'COMMENTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (696, 87, E'PHOTO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (697, 87, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (698, 69, E'COMMENTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (694, 87, E'LAW');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (699, 87, E'GUIDANCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (695, 87, E'ARTICLES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (700, 87, E'IMAGES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (702, 87, E'DRINKING WATER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (703, 87, E'HISTORICAL REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (704, 87, E'REMEDIATION OPTIONS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (705, 7, E'PROGRESS REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (706, 87, E'INVOICE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (707, 89, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (708, 89, E'EXPERT REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (710, 89, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (711, 89, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (712, 89, E'DEPOSITION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (713, 30, E'ALS - Explorer Download');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (714, 30, E'ALS - All Soil Sample Results');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (715, 9, E'SOP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (328, 31, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (716, 31, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (717, 31, E'LAND TITLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (718, 1, E'EXPERT REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (719, 31, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (721, 93, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (722, 93, E'FORM');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (723, 93, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (724, 93, E'SITE INSPECTION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (725, 31, E'PERMIT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (726, 31, E'REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (727, 31, E'FORM');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (732, 67, E'COST DOCUMENTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (735, 93, E'PHOTOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (736, 93, E'FIGURES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (737, 67, E'ROD');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (738, 67, E'IMAGE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (739, 93, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (740, 93, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (741, 93, E'INDEX');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (730, 94, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (734, 94, E'MAP/FIGURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (733, 94, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (731, 94, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (729, 94, E'AGENDA/MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (728, 94, E'FINANCIAL REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (743, 94, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (744, 94, E'BID/CONTRACT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (745, 94, E'SOP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (742, 94, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (746, 96, E'Map/drawing/figure');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (748, 96, E'Letter');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (749, 96, E'Data');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (750, 96, E'Proposal/Budget');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (754, 97, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (755, 94, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (756, 94, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (757, 97, E'BORING LOGS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (760, 97, E'REGULATION/GUIDANCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (762, 97, E'NEWS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (764, 97, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (767, 94, E'PHOTOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (768, 94, E'GUIDANCE/REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (769, 97, E'ARTICLES/REFERENCES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (766, 97, E'INSPECTIONS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (765, 97, E'ORDERS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (763, 97, E'PRESENTATIONS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (761, 97, E'PHOTOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (759, 97, E'WORK PLANS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (758, 97, E'MEMOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (753, 97, E'FORMS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (752, 97, E'SPECIFICATIONS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (751, 97, E'FIGURES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (770, 97, E'MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (772, 97, E'BIDS/SOLICITATIONS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (771, 97, E'REPORTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (773, 97, E'PERMITTING');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (774, 94, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (775, 94, E'PERMITTING');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (776, 94, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (777, 94, E'BORING LOGS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (778, 94, E'PROGRESS REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (779, 73, E'COST DOCUMENTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (781, 73, E'PROPOSAL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (782, 73, E'REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (783, 73, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (784, 73, E'AGENDA/MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (664, 73, E'PHOTOS/VIDEOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (785, 73, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (786, 73, E'SCHEDULE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (787, 73, E'LICENSE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (780, 73, E'CONTRACTS/BIDS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (788, 100, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (789, 73, E'STATUS UPDATE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (790, 101, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (792, 101, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (794, 101, E'BORING LOGS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (796, 101, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (799, 101, E'PERMITTING DOCUMENTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (801, 101, E'CONTRACT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (802, 67, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (803, 101, E'PROGRESS REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (804, 101, E'NOTICE OF VIOLATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (805, 101, E'SHIPMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (807, 101, E'INSPECTION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (809, 101, E'DEPOSITION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (810, 67, E'FACT SHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (812, 67, E'NOTICE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (813, 101, E'AGENDA/MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (793, 101, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (814, 67, E'GUIDANCE/REGULATIONS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (815, 67, E'CONTRACT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (816, 67, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (817, 69, E'BORING LOGS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (818, 69, E'INDEX');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (819, 69, E'FIELD NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (820, 96, E'Inspection');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (821, 96, E'Permit');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (747, 96, E'Article/Reference');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (822, 96, E'Boring logs');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (823, 69, E'SOP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (824, 69, E'PATENTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (825, 69, E'GUIDANCE/REGULATIONS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (800, 101, E'GUIDANCE/REGULATIONS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (826, 101, E'PLANS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (827, 69, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (795, 101, E'MAP/FIGURE/PHOTO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (808, 101, E'LEGAL DOCS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (828, 96, E'Agenda/Minutes');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (829, 96, E'GUIDANCE/REGULATIONS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (830, 94, E'NEWS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (831, 67, E'PERMIT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (832, 67, E'PHOTOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (833, 102, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (834, 102, E'Reports');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (835, 102, E'Memorandum');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (836, 102, E'Data');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (837, 102, E'Articles');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (838, 102, E'Cost Documents');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (839, 102, E'Figures');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (840, 102, E'Tables');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (841, 96, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (843, 103, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (844, 104, E'Court Document');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (845, 104, E'Form');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (848, 104, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (849, 104, E'Costs');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (850, 104, E'Memo');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (852, 104, E'Data');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (853, 104, E'Comments/Responses');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (854, 104, E'Guidelines');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (855, 104, E'Presentation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (856, 104, E'Figure');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (857, 105, E'Letter');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (858, 105, E'Email');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (859, 105, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (860, 105, E'Data');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (861, 105, E'Figure');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (862, 106, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (863, 106, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (864, 106, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (865, 106, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (866, 106, E'SUPERFUND');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (867, 106, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (868, 106, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (869, 106, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (870, 106, E'FIGURES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (871, 106, E'GUIDANCE/REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (872, 106, E'BORING LOGS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (873, 106, E'FACT SHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (874, 106, E'PRESS RELEASE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (875, 106, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (876, 106, E'PERMITTING');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (877, 106, E'AGENDA/MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (878, 106, E'COST DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (879, 106, E'CONTRACT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (880, 106, E'PHOTOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (881, 94, E'LAW');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (882, 106, E'FORM');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (883, 149, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (884, 149, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (885, 149, E'PHOTO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (886, 149, E'AGENDA/MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (887, 149, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (888, 149, E'ROD - RECORD OF DECISION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (889, 104, E'Newspaper Article');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (890, 105, E'Cover sheet only');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (891, 149, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (893, 105, E'Calculation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (894, 106, E'EXPERT REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (895, 105, E'PowerPoint presentation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (847, 104, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (897, 104, E'Article/Reference');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (851, 104, E'Meeting Agenda/Minutes');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (898, 104, E'Permit');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (896, 104, E'Deposition/Expert Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (899, 96, E'Bid');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (900, 150, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (901, 106, E'PATENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (902, 104, E'Photo');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (903, 151, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (904, 151, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (905, 67, E'NEWSPAPER ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (906, 66, E'LOGS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (908, 66, E'ACCESS DOCUMENTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (909, 146, E'Eastern Division');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (910, 146, E'Chancery Division');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (911, 146, E'Law Division');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (912, 104, E'Notes');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (914, 152, E'Manual/Plan');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (913, 152, E'Letters/Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (915, 152, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (916, 152, E'Expert Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (917, 152, E'Data');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (918, 152, E'Comments');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (919, 152, E'Court/Legal Document');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (920, 152, E'Work Plan');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (921, 153, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (922, 153, E'FACT SHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (923, 153, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (924, 153, E'ARTICLES/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (925, 153, E'GUIDANCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (926, 153, E'PHOTOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (927, 153, E'FIGURES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (928, 153, E'EXPERT REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (929, 153, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (930, 153, E'RESUME');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (931, 153, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (932, 153, E'MSDS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (933, 152, E'Article/Reference');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (934, 152, E'Notes');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (935, 152, E'Photo/Image');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (936, 155, E'ARTICLES/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (937, 155, E'GUIDANCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (938, 155, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (939, 155, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (940, 155, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (941, 155, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (942, 155, E'EXPERT REPORTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (943, 155, E'FACT SHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (944, 155, E'NEWS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (945, 155, E'Figure');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (946, 155, E'Form');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (947, 152, E'Costs');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (948, 152, E'News');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (950, 156, E'NEWS/MAGAZINE ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (951, 156, E'JOURNAL ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (952, 156, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (842, 103, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (953, 103, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (959, 103, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (960, 103, E'PHOTO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (961, 103, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (958, 103, E'COURT DOCUMENTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (962, 103, E'COSTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (963, 156, E'PRESS RELEASE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (964, 156, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (965, 103, E'AGENDA/MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (966, 103, E'WEB PAGE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (967, 103, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (968, 66, E'DEED');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (969, 66, E'DEED NOTICE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (970, 66, E'DECLARATION OF ENVIRONMENTAL RESTRICTION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (971, 66, E'EASEMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (972, 103, E'FIGURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (973, 103, E'CONTRACT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (974, 103, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (975, 157, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (976, 157, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (977, 157, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (978, 157, E'MAPS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (979, 66, E'DRAFT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (980, 66, E'LAB DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (981, 66, E'CONTRACT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (982, 66, E'HASP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (983, 158, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (984, 158, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (985, 158, E'NEWS/MAGAZINE ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (986, 158, E'FACT SHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (987, 158, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (988, 158, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (989, 158, E'FIGURE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (990, 159, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (991, 159, E'Costs');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (992, 159, E'Reports');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (994, 159, E'Image');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (996, 159, E'News/Articles');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (997, 159, E'Comments/Responses');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (998, 159, E'Forms');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (999, 159, E'Presentation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1000, 158, E'MEMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1001, 159, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1002, 158, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1003, 158, E'PERMIT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1004, 158, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1005, 158, E'Notices of Intent');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1006, 158, E'COMPLAINT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1007, 158, E'COURT DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1085, 172, E'Contract');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (949, 151, E'Presentation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1012, 160, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1013, 160, E'Legal Documents');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1014, 160, E'Map');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1015, 160, E'Memorandum');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1016, 160, E'Chain of Custody');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1017, 160, E'Photos');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1018, 160, E'Sampling Log');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1019, 160, E'Organogram');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1022, 160, E'SpreadSheet');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1024, 160, E'4D Image File (for 4D Interactive Model Player)');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1025, 160, E'Action Plan');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1026, 160, E'Attachment B');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1027, 160, E'Plan');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1028, 160, E'Presentation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1030, 160, E'Meeting');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1031, 160, E'Protocol');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1032, 160, E'AutoCad Drawing');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1029, 160, E'Site Features Description');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1023, 160, E'Project Management');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1021, 160, E'Project Management');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1033, 160, E'Email');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1034, 69, E'EXECUTIVE SUMMARY');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1035, 160, E'NOTICE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1036, 163, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1037, 163, E'Permits');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1038, 163, E'LSRP Documents');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1041, 159, E'Permit');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1042, 159, E'Work Plan');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1044, 159, E'Record of Decision');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (993, 159, E'Legal Documents');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (995, 159, E'Fact Sheet');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1046, 159, E'Notes');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1047, 159, E'Index');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1048, 160, E'Letter');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1051, 167, E'Technical Memorandum');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1052, 167, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1053, 167, E'Data');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1054, 167, E'Presentation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1056, 168, E'Journal article');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1057, 168, E'Fact Sheet');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1058, 168, E'Government Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1061, 166, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1062, 161, E'Modelo = Template');


/* Data for the 'id2.type' table  (Records 1001 - 1500) */

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1063, 161, E'DossiÃª');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1064, 66, E'MEMORANDUM OF AGREEMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1065, 161, E'Procedimento da Qualidade');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1066, 161, E'InstruÃ§Ã£o de Trabalho');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1067, 161, E'Registro da Qualidade');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1059, 161, E'Guidance');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1068, 161, E'Proposta = Proposal');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1069, 164, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1070, 164, E'Permitting');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1071, 164, E'Reports');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1072, 161, E'Contrato = Contract');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1073, 159, E'Minutes/Agenda');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1074, 171, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1075, 171, E'Data');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1076, 171, E'Figures');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1077, 171, E'Major Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1078, 171, E'MSDS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1079, 172, E'Letters/Emails');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1080, 171, E'Photos');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1081, 171, E'Legal document');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1082, 171, E'Presentation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1083, 171, E'Agenda/Minutes');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1084, 159, E'Proposal');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1086, 172, E'Charging');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1087, 171, E'Article/Reference');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1088, 171, E'News');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1089, 159, E'Map');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1045, 159, E'Boring/Well logs');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1090, 159, E'Field Notes');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1091, 161, E'Documentos Relativos Ã  Empresa');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1092, 161, E'CREA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1093, 173, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1094, 173, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1095, 173, E'Fact Sheet');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1096, 173, E'Work Plan');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1097, 173, E'Notes');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1098, 173, E'Legal Document');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1099, 152, E'Forms');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1100, 174, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1101, 175, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1102, 175, E'Analyitcal Results');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1103, 159, E'Guidance/Regulation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1104, 159, E'Standard Operating Procedure');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1106, 172, E'Chemical Products');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1107, 172, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1108, 172, E'Photos');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1109, 178, E'recibo');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1110, 169, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1111, 169, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1112, 169, E'GUIDANCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1113, 169, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1114, 169, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1115, 169, E'LEGAL DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1116, 169, E'PHOTOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1117, 169, E'INSPECTIONS/REMEDIAL PLANS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1118, 169, E'BULLETIN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1119, 169, E'COMMENTS/RESPONSES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1120, 169, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1121, 169, E'INVOICE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1122, 169, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1123, 178, E'Nota Fiscal');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1008, 66, E'AS-BUILT CERTIFICATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1124, 169, E'BORING LOGS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1125, 169, E'MINUTES/AGENDA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1126, 169, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1127, 169, E'MAP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1128, 66, E'BID - QUOTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1009, 66, E'LOCATION CERTIFICATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1129, 169, E'NEWS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1130, 161, E'Certificado');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1131, 169, E'REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1132, 179, E'relatÃ³rio');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1133, 169, E'COST');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1134, 1, E'BORING LOGS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1135, 180, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1136, 180, E'Reference');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1137, 180, E'Guidance');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1138, 180, E'Data');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1139, 180, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1140, 180, E'Legal Document');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1141, 158, E'Survey');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1142, 184, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1143, 184, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1145, 171, E'Pamphlet');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1146, 171, E'Notes');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1147, 171, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1149, 154, E'LegislaÃ§Ã£o');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1150, 159, E'Testimony');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1153, 281, E'Documentos Processo');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1154, 281, E'NotificaÃ§Ã£o/Auto');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1155, 281, E'RelatÃ³rio Pericial');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1156, 281, E'RelatÃ³rio TÃ©cnico');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1157, 281, E'Ata ReuniÃ£o');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1158, 281, E'LicenÃ§a');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1159, 280, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1160, 280, E'Standard');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1161, 284, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1162, 284, E'Comments/Responses');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1163, 284, E'Data');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1164, 284, E'News/Articles');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1165, 284, E'Permit');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1166, 284, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1167, 284, E'Cost');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1168, 284, E'Proposal');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1169, 284, E'Map');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1170, 284, E'Work Plan');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1171, 284, E'Reference');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1172, 284, E'Minutes/Agenda');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1173, 284, E'Guidance');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1174, 284, E'Figures');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1175, 284, E'Legal Document');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1176, 284, E'Presentation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1177, 160, E'Boring Log');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1178, 171, E'Assessment Exam');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1179, 171, E'Law/regulation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1180, 284, E'Petition');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1181, 287, E'Articles of Merger');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1182, 287, E'Representative Agreement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1183, 287, E'Operating Agreement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1184, 287, E'Deed');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1185, 287, E'Bank Statement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1186, 287, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1187, 287, E'Certificate of Merger');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1188, 287, E'Articles of Organization');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1189, 287, E'Trust Agreement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1190, 287, E'K1 Form');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1191, 287, E'Vehicle Title');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1192, 287, E'Assignment Of Interest');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1193, 287, E'Buisness Registration');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1194, 287, E'Initial List');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1195, 288, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1196, 288, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1197, 288, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1198, 288, E'PERMIT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1199, 287, E'Approval of Purchase Agreement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1200, 287, E'Inter-Creditor Agreement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1201, 288, E'ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1202, 288, E'REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1203, 287, E'Shareholder Resolution');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1204, 288, E'MAP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1205, 287, E'Directors Resolution');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1206, 287, E'Certificate of Election');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1207, 288, E'MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1208, 288, E'PRESENTATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1209, 288, E'NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1210, 288, E'GUIDANCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1211, 288, E'PHOTOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1212, 288, E'FIGURE / TABLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1213, 287, E'Summary');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1214, 287, E'Purchase Agreement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1215, 287, E'Promissory Note');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1216, 287, E'Security Agreement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1217, 287, E'Guaranty Agreement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1218, 287, E'Transfer Assignment');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1219, 287, E'Resolution of Member and Manager');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1220, 287, E'Certicicate of Voluntary Termination');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1221, 287, E'Agreement for Assigment and Capital Contribution');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1222, 287, E'Invoice');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1223, 287, E'Notice');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1224, 287, E'Plan of Merger');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1225, 287, E'Schedule');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1226, 287, E'Transmittal Form');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1227, 287, E'Tax Document');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1228, 288, E'DATABASE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1229, 288, E'SPREADSHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1230, 288, E'WEB PAGE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1231, 287, E'Consent');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1232, 287, E'Real Estate Investment Agreement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1233, 287, E'TABLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1234, 287, E'Balance Sheet');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1235, 287, E'Action');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1236, 287, E'Plan of Election');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1237, 9, E'LEGAL DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1238, 287, E'Will');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1239, 287, E'Articles of Trust');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1240, 287, E'UCC Financing Statement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1241, 287, E'231 Form');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1242, 287, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1244, 287, E'Tax Return');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1245, 287, E'1099');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1246, 287, E'Index');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1249, 287, E'Agreement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1250, 287, E'Certificate of Incorporation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1251, 287, E'Closing Statement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1253, 287, E'Exchange');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1254, 287, E'Insurance Policy');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1256, 287, E'Affidavit');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1243, 287, E'Resolution');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1247, 287, E'Resolution');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1248, 287, E'Assignment of Interest');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1252, 287, E'TABLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1255, 287, E'Closing Statement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1257, 287, E'Check');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1258, 287, E'Settlement Statement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1259, 287, E'Certificate of Organization');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1260, 289, E'DEPOSITION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1151, 171, E'Award');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1261, 289, E'EXPERT REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1262, 287, E'Statement of Account Status');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1263, 103, E'Law');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1264, 103, E'OFFICIAL DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1265, 287, E'Redemption Agreement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1266, 287, E'Certificate of Limited Partnership Filing');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1148, 171, E'Medical Records');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1152, 171, E'Health & Safety Documents');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1445, 1, E'SOP-TECHNICAL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1447, 1, E'CERTIFICATE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1267, 287, E'Agreement of Limited Partnership');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1268, 287, E'Articles of Incorporation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1269, 287, E'Offer');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1270, 291, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1272, 291, E'Employee/Personal Communication');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1273, 291, E'Letter');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1274, 291, E'Table');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1275, 287, E'Policy');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1277, 287, E'Appraisal');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1278, 280, E'Letter');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1279, 287, E'Map');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1280, 287, E'Sale and Assigment');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1271, 291, E'Memo');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1281, 291, E'Figures');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1284, 292, E'Graphics');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1285, 292, E'Reports');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1286, 292, E'Tables');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1287, 292, E'Model');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1288, 292, E'Memos');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1289, 292, E'Letter');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1290, 292, E'Presentation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1291, 287, E'Confirmation of Transfer');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1292, 171, E'Expert report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1293, 171, E'Environmental data');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1294, 171, E'Industrial hygiene data');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1397, 311, E'Survey');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1300, 293, E'Letter');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1301, 293, E'Table');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1299, 293, E'Figure');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1302, 293, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1303, 294, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1304, 294, E'Graphic');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1305, 294, E'Correspondance');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1306, 294, E'Letter');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1307, 294, E'Note');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1308, 293, E'Graphics');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1309, 294, E'Memo');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1313, 297, E'Draft Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1314, 297, E'Final Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1315, 297, E'Guidance Document');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1316, 297, E'Journal Article');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1317, 287, E'Real Estate Listing');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1318, 287, E'Power of Attorney');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1319, 287, E'Statement of Change');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1321, 1, E'WELL LOGS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1322, 287, E'Figure');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1323, 287, E'Order');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1324, 287, E'Memorandum');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1325, 287, E'Response to Motion');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1326, 287, E'Motion');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1327, 299, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1328, 299, E'Comments/Response');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1329, 299, E'Invoice');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1330, 299, E'QAPP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1331, 299, E'SAP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1332, 299, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1333, 299, E'EPA Form');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1334, 299, E'Map');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1335, 299, E'Log');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1336, 299, E'Table');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1337, 299, E'Photo');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1338, 299, E'Agreement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1339, 299, E'Data');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1340, 299, E'Chain of Custody Form');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1341, 299, E'Figure');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1342, 293, E'Excel');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1343, 293, E'zip file');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1344, 299, E'Certification');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1345, 299, E'Notes');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1346, 299, E'Notice');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1347, 299, E'Guidance');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1348, 9, E'SAMPLING PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1349, 303, E'Article');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1350, 303, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1351, 303, E'Notice');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1352, 299, E'Check');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1353, 163, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1354, 165, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1355, 165, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1356, 303, E'Comments/Response');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1357, 303, E'Power Point Presentation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1358, 303, E'Legal Document');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1359, 303, E'Schedule');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1360, 303, E'Survey');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1361, 303, E'Data');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1362, 299, E'Proposal');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1363, 297, E'Technical Memorandum');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1364, 306, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1365, 306, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1366, 306, E'LEGAL DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1367, 299, E'SOP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1368, 306, E'FACT SHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1369, 299, E'Cost');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1370, 307, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1371, 307, E'Figures');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1372, 307, E'Data');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1373, 307, E'Legal Document');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1374, 307, E'Workplan');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1375, 307, E'Presentation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1376, 307, E'Notes');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1377, 307, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1378, 307, E'Proposal');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1379, 307, E'Inventory');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1380, 303, E'Workplan');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1381, 303, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1382, 9, E'RECORD OF DECISION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1383, 77, E'Figure');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1384, 77, E'Table');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1386, 77, E'Permit');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1387, 77, E'Work Plan');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1388, 307, E'Index');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1389, 307, E'Comments/Response');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1390, 307, E'Notification');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1391, 307, E'Permit');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1392, 307, E'Form');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1393, 307, E'Reference');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1394, 311, E'Boring Logs');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1395, 311, E'Logs');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1396, 311, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1398, 311, E'Data');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1399, 311, E'Map');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1400, 311, E'Appraisal');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1401, 307, E'Log');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1402, 311, E'Photo');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1403, 312, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1404, 312, E'Note');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1405, 312, E'Project');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1406, 311, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1407, 311, E'Comments/Response');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1408, 311, E'Proposal');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1409, 311, E'Presentation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1410, 311, E'Guidance');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1411, 307, E'Well Record');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1412, 311, E'Field Notes');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1413, 307, E'Boring Log');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1414, 307, E'Agenda/Minutes');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1416, 307, E'Schedule');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1417, 307, E'Revision');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1418, 311, E'Notice');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1419, 311, E'License');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1431, 171, E'Health & Safety');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1432, 171, E'Legal Documents');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1433, 171, E'Industrial hygiene');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1434, 171, E'Health and Safety');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1435, 171, E'Protocolo da Inicial');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1436, 171, E'Environmental Date');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1437, 171, E'Analise de residuos');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1438, 171, E'Emails');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1440, 77, E'Exhibit');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1441, 77, E'Bid');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1442, 1, E'PROPOSAL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1443, 1, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1444, 1, E'ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1446, 1, E'PROFILE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1448, 1, E'SCHEDULE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1449, 9, E'TABLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1451, 313, E'Figure');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1452, 313, E'Comments/Response');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1453, 313, E'Correspondence');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1454, 313, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1455, 313, E'Work Plan');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1456, 313, E'Summary');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1457, 313, E'Notice');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1458, 313, E'Certification');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1459, 313, E'Table');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1460, 313, E'Presentation');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1461, 313, E'Article');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1462, 313, E'Guidance');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1463, 313, E'Purchase Order');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1464, 313, E'Inventory');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1465, 313, E'Data');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1466, 313, E'Form');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1467, 287, E'Exchange Agreement');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1468, 287, E'Renunciation And Disclaimer');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1469, 287, E'Registration');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1470, 287, E'Assessment');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1471, 313, E'Legal Document');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1472, 313, E'Agenda');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1473, 313, E'Application');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1474, 313, E'Meeting/Minutes');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1475, 313, E'Proposal');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1476, 313, E'Field Notes');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1477, 313, E'SOP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1478, 313, E'Resume');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1479, 171, E'Major Reports');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1480, 317, E'PERMITTING');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1482, 317, E'INSPECTION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1481, 317, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1483, 317, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1484, 317, E'RESPONSE/COMMENTS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1485, 307, E'Maps');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1486, 313, E'Index');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1487, 281, E'CARTA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1488, 281, E'PLANTA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1489, 281, E'RELATÃRIO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1490, 281, E'ENCOMENDA DE SERVIÃOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1491, 281, E'PARECER TÃCNICO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1492, 281, E'DOCUMENTOS DIVERSOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1493, 281, E'NOTIFICAÃÃO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1494, 281, E'REQUERIMENTO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1495, 281, E'ESCOPO TÃCNICO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1496, 281, E'APRESENTAÃÃO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1497, 281, E'PROPOSTA TÃCNICA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1498, 281, E'ESCOPO DOS SERVIÃOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1499, 281, E'PLANILHA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1500, 281, E'CERTIFICADO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1501, 281, E'REQUISIÃÃO DE COMPRAS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1502, 281, E'LAUDO TÃCNICO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1503, 281, E'MANUAL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1504, 281, E'ESCOPO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1505, 281, E'DOCUMENTO LEGAL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1506, 281, E'ATA DE REUNIÃO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1507, 281, E'PLANILHA DE PREÃOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1508, 281, E'AUTORIZAÃÃO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1509, 281, E'PROPOSTA COMERCIAL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1510, 281, E'ASSESSORIA TÃCNICA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1511, 281, E'ESTIMATIVA DE CUSTOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1512, 281, E'MAPA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1513, 281, E'LAUDO LABORATORIAL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1514, 281, E'AVALIAÃÃO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1515, 281, E'ACORDO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1516, 281, E'COMUNICADO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1517, 281, E'FICHA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1518, 281, E'MODELO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1519, 281, E'CRONOGRAMA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1520, 281, E'DECRETO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1521, 281, E'DOCUMENTOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1522, 281, E'RESUMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1523, 281, E'COMPROVANTE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1524, 281, E'ARTIGO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1525, 281, E'CONVOCAÃÃO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1526, 281, E'LICENÃA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1527, 281, E'REGISTRO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1528, 281, E'OFÃCIO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1529, 281, E'ABERTURA DE PROCESSO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1530, 281, E'AUTO DE CONSTATAÃÃO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1531, 281, E'AUTO DE INFRAÃÃO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1532, 281, E'RESPOSTA DE PROCESSO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1533, 281, E'ESCRITURA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1534, 281, E'OPINIÃO TÃCNICA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1535, 281, E'ART');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1536, 281, E'E-MAIL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1537, 281, E'DELIBERAÃÃO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1538, 281, E'CONTRATO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1539, 281, E'TERMO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1540, 281, E'CROQUI');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1541, 281, E'CRONOLOGIA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1542, 281, E'ORGANOGRAMA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1543, 281, E'TABELA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1544, 281, E'BANCO DE DADOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1545, 281, E'DOCUMENTO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1546, 281, E'FOTO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1547, 281, E'IMAGEM');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1548, 281, E'EMAILS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1549, 281, E'MODELO DE DOCUMENTO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1550, 281, E'CONTATOS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1551, 307, E'Inspection');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1552, 307, E'Photos');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1553, 318, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1554, 318, E'REGULATION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1555, 318, E'GUIDANCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1556, 318, E'ARTICLE/REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1557, 318, E'MAP');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1558, 318, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1559, 318, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1560, 318, E'FACT SHEET');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1561, 150, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1562, 9, E'PERMIT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1563, 171, E'Reportagens');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1564, 312, E'Ata de reuniÃ£o');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (657, 78, E'LETTER');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1565, 78, E'INSPECTION');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1566, 319, E'LEGAL DOCUMENT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1567, 319, E'CORRESPONDENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1568, 319, E'REPORT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1569, 319, E'PERMITTING');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1570, 319, E'WORK PLAN');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1571, 319, E'COMMENTS/RESPONSE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1572, 319, E'FORM');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1573, 319, E'CONTRACT');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1574, 319, E'DRAWING');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1575, 319, E'REFERENCE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1576, 319, E'PROPOSAL');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1577, 319, E'PHOTO');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1578, 319, E'ARTICLE');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1579, 319, E'DATA');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1580, 319, E'LOGS');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1581, 319, E'FIELD NOTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1582, 320, E'Report');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1583, 320, E'GIS File');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1584, 320, E'Map');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1585, 155, E'MEETINGS/MINUTES');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1586, 171, E'34');


/* Data for the 'id2.type' table  (Records 1501 - 1504) */

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1587, 171, E'35');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1588, 171, E'36');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1589, 171, E'22');

INSERT INTO id2.type ("id", "projectid", "type")
VALUES (1590, 171, E'37');