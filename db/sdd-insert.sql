USE sdd-ufg;

SET FOREIGN_KEY_CHECKS = 0;

INSERT INTO processes(name, initial_date, teacher_intent_date, primary_distribution_date, substitute_intent_date, secondary_distribution_date, final_date)
VALUES ("processes1", "2015-01-01", "2015-01-21", "2015-01-25", "2015-01-26", "2015-01-27", "2015-01-28");
INSERT INTO processes(name, initial_date, teacher_intent_date, primary_distribution_date, substitute_intent_date, secondary_distribution_date, final_date)
VALUES ("processes2", "2015-07-01", "2015-07-21", "2015-07-25", "2015-07-26", "2015-07-27", "2015-07-28");

INSERT INTO process_configurations(name, description, value, data_type, type)
VALUES ("process_configurations1", "description 1", "value1", "data_type1", "CRITERIA");
INSERT INTO process_configurations(name, description, value, data_type, type)
VALUES ("process_configurations2", "description 2", "value2", "data_type2", "CRITERIA");

INSERT INTO processes_process_configurations(process_id, process_configuration_id)
VALUES (1, 1);
INSERT INTO processes_process_configurations(process_id, process_configuration_id)
VALUES (2, 2);

INSERT INTO teachers(registry, url_lattes, entry_date, formation, workload, about, rg, cpf, birth_date, situation)
VALUES ("registry1", "http://www.google.com", "2000-01-01", "Engenharia de Software", 40, "about1", "911225341", "12116549582", "1980-01-01", "situation1");
INSERT INTO teachers(registry, url_lattes, entry_date, formation, workload, about, rg, cpf, birth_date, situation)
VALUES ("registry2", "http://www.google.com", "2001-01-01", "Ciência da Computação", 20, "about2", "403289440", "38621118815", "1981-01-01", "situation2");
INSERT INTO teachers(registry, url_lattes, entry_date, formation, workload, about, rg, cpf, birth_date, situation)
VALUES ("registry3", "http://www.google.com", "2002-01-01", "Sistemas de Informação", 40, "about3", "429434121", "71168581567", "1982-01-01", "situation3");
INSERT INTO teachers(registry, url_lattes, entry_date, formation, workload, about, rg, cpf, birth_date, situation)
VALUES ("registry4", "http://www.google.com", "2003-01-01", "Engenharia de Software", 20, "about4", "2977269", "22549179510", "1983-01-01", "situation4");
INSERT INTO teachers(registry, url_lattes, entry_date, formation, workload, about, rg, cpf, birth_date, situation)
VALUES ("registry5", "http://www.google.com", "2004-01-01", "Ciência da Computação", 40, "about5", "418757896", "06525146186", "1984-01-01", "situation5");
INSERT INTO teachers(registry, url_lattes, entry_date, formation, workload, about, rg, cpf, birth_date, situation)
VALUES ("registry6", "http://www.google.com", "2005-01-01", "Ciência da Computação", 40, "about6", "66666666", "66666666", "1985-01-01", "situation6");
INSERT INTO teachers(registry, url_lattes, entry_date, formation, workload, about, rg, cpf, birth_date, situation)
VALUES ("registry7", "http://www.google.com", "2006-01-01", "Ciência da Computação", 40, "about7", "77777777", "77777777", "1986-01-01", "situation7");

INSERT INTO knowledges(name)
VALUES ("knowledges1");
INSERT INTO knowledges(name)
VALUES ("knowledges2");
INSERT INTO knowledges(name)
VALUES ("knowledges3");
INSERT INTO knowledges(name)
VALUES ("knowledges4");
INSERT INTO knowledges(name)
VALUES ("knowledges5");
INSERT INTO knowledges(name)
VALUES ("knowledges6");
INSERT INTO knowledges(name)
VALUES ("knowledges7");
INSERT INTO knowledges(name)
VALUES ("knowledges8");
INSERT INTO knowledges(name)
VALUES ("knowledges9");
INSERT INTO knowledges(name)
VALUES ("knowledges10");

INSERT INTO schedules(week_day, start_time, end_time)
VALUES (2, "18:00:00", "22:00:00");
INSERT INTO schedules(week_day, start_time, end_time)
VALUES (3, "18:00:00", "22:00:00");
INSERT INTO schedules(week_day, start_time, end_time)
VALUES (4, "18:00:00", "22:00:00");
INSERT INTO schedules(week_day, start_time, end_time)
VALUES (5, "18:00:00", "22:00:00");
INSERT INTO schedules(week_day, start_time, end_time)
VALUES (6, "18:00:00", "22:00:00");

INSERT INTO courses(name)
VALUES ("Engenharia de Software");
INSERT INTO courses(name)
VALUES ("Ciência da Computação");
INSERT INTO courses(name)
VALUES ("Sistemas de Informação");

INSERT INTO subjects(name, theoretical_workload, practical_workload, knowledge_id, course_id)
VALUES ("subject1", 32, 32, 1, 4);
INSERT INTO subjects(name, theoretical_workload, practical_workload, knowledge_id, course_id)
VALUES ("subject2", 0, 64, 1, 4);
INSERT INTO subjects(name, theoretical_workload, practical_workload, knowledge_id, course_id)
VALUES ("subject3", 0, 64, 2, 5);
INSERT INTO subjects(name, theoretical_workload, practical_workload, knowledge_id, course_id)
VALUES ("subject4", 64, 0, 2, 5);
INSERT INTO subjects(name, theoretical_workload, practical_workload, knowledge_id, course_id)
VALUES ("subject5", 32, 32, 3, 6);
INSERT INTO subjects(name, theoretical_workload, practical_workload, knowledge_id, course_id)
VALUES ("subject5", 32, 32, 4, 6);
INSERT INTO subjects(name, theoretical_workload, practical_workload, knowledge_id, course_id)
VALUES ("subject7", 32, 32, 10, 6);

INSERT INTO locals(name, address, capacity)
VALUES ("locals1", "address1", 30);
INSERT INTO locals(name, address, capacity)
VALUES ("locals2", "address2", 30);
INSERT INTO locals(name, address, capacity)
VALUES ("locals3", "address3", 30);
INSERT INTO locals(name, address, capacity)
VALUES ("locals4", "address4", 30);
INSERT INTO locals(name, address, capacity)
VALUES ("locals5", "address5", 30);

INSERT INTO clazzes(name, vacancies, subject_id, process_id)
VALUES ("clazzes1", 30, 6, 2);
INSERT INTO clazzes(name, vacancies, subject_id, process_id)
VALUES ("clazzes2", 30, 7, 2);
INSERT INTO clazzes(name, vacancies, subject_id, process_id)
VALUES ("clazzes3", 30, 8, 2);
INSERT INTO clazzes(name, vacancies, subject_id, process_id)
VALUES ("clazzes4", 30, 9, 2);
INSERT INTO clazzes(name, vacancies, subject_id, process_id)
VALUES ("clazzes5", 30, 10, 2);
INSERT INTO clazzes(name, vacancies, subject_id, process_id)
VALUES ("clazzes5", 30, 11, 2);
INSERT INTO clazzes(name, vacancies, subject_id, process_id)
VALUES ("clazzes5", 30, 12, 2);

INSERT INTO knowledges_teachers(teacher_id, knowledge_id, level)
VALUES (1, 1, 1);
INSERT INTO knowledges_teachers(teacher_id, knowledge_id, level)
VALUES (1, 2, 2);
INSERT INTO knowledges_teachers(teacher_id, knowledge_id, level)
VALUES (2, 1, 2);
INSERT INTO knowledges_teachers(teacher_id, knowledge_id, level)
VALUES (2, 2, 1);
INSERT INTO knowledges_teachers(teacher_id, knowledge_id, level)
VALUES (3, 3, 1);
INSERT INTO knowledges_teachers(teacher_id, knowledge_id, level)
VALUES (3, 4, 2);
INSERT INTO knowledges_teachers(teacher_id, knowledge_id, level)
VALUES (4, 3, 2);
INSERT INTO knowledges_teachers(teacher_id, knowledge_id, level)
VALUES (4, 4, 1);
INSERT INTO knowledges_teachers(teacher_id, knowledge_id, level)
VALUES (5, 5, 2);
INSERT INTO knowledges_teachers(teacher_id, knowledge_id, level)
VALUES (5, 6, 2);

INSERT INTO clazzes_teachers(clazz_id, teacher_id, status)
VALUES (1, 1, "APPROVED");
INSERT INTO clazzes_teachers(clazz_id, teacher_id, status)
VALUES (2, 2, "APPROVED");
INSERT INTO clazzes_teachers(clazz_id, teacher_id, status)
VALUES (6, 1, "APPROVED");
INSERT INTO clazzes_teachers(clazz_id, teacher_id, status)
VALUES (7, 2, "APPROVED");

INSERT INTO roles(type, teacher_id, knowledge_id)
VALUES ("COORDENADOR", 6, 1);
INSERT INTO roles(type, teacher_id, knowledge_id)
VALUES ("FACILITADOR", 7, 2);

INSERT INTO teachers_change_history(modification_date, name, registry, url_lattes, entry_date, formation, workload, about, rg, cpf, birth_date, situation, teacher_id)
VALUES ("2015-01-01 23:59:59", "name1", "registry1", "http://www.google.com", "2000-01-01", "Engenharia de Software", 40, "about1", "911225341", "12116549582", "1980-01-01", "situation1", 1);
INSERT INTO teachers_change_history(modification_date, name, registry, url_lattes, entry_date, formation, workload, about, rg, cpf, birth_date, situation, teacher_id)
VALUES ("2015-01-02 23:59:59", "name2", "registry2", "http://www.google.com", "2001-01-01", "Ciência da Computação", 20, "about2", "403289440", "38621118815", "1981-01-01", "situation2", 2);

INSERT INTO users(login, email, name, password, is_admin, teacher_id)
VALUES ("login1", "email1@gmail.com", "name1", "password1", 0, 1);
INSERT INTO users(login, email, name, password, is_admin, teacher_id)
VALUES ("login2", "email2@gmail.com", "name2", "password2", 0, 2);
INSERT INTO users(login, email, name, password, is_admin, teacher_id)
VALUES ("login3", "email3@gmail.com", "name3", "password3", 0, 3);
INSERT INTO users(login, email, name, password, is_admin, teacher_id)
VALUES ("login4", "email4@gmail.com", "name4", "password4", 0, 4);
INSERT INTO users(login, email, name, password, is_admin, teacher_id)
VALUES ("login5", "email5@gmail.com", "name5", "password5", 0, 5);
INSERT INTO users(login, email, name, password, is_admin, teacher_id)
VALUES ("login6", "email6@gmail.com", "name6", "password6", 1, 6);
INSERT INTO users(login, email, name, password, is_admin, teacher_id)
VALUES ("login7", "email7@gmail.com", "name7", "password7", 1, 7);

SET FOREIGN_KEY_CHECKS = 1;