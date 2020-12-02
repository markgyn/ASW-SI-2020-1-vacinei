package org.ufg.vacinei.dao.repository;

import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.CrudRepository;
import org.ufg.vacinei.model.Schedule;
import java.util.List;

public interface ScheduleRepository extends CrudRepository<Schedule, Long> {
	
	@Query("select s from Schedule s where s.user.id = :id")
	List<Schedule> findByUserId(Long id);
	
}
