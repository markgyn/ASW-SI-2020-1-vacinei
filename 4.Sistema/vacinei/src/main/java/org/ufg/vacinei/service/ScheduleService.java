package org.ufg.vacinei.service;

import org.ufg.vacinei.model.Schedule;
import org.ufg.vacinei.view.ScheduleDto;
import java.util.List;

public interface ScheduleService {
	
	List<Schedule> getSchedulesForUser();
	
	Schedule scheduleVaccine(Schedule schedule);
	
	Schedule updateSchedule(Schedule schedule);
	
	Schedule scheduleDtoToEntity(ScheduleDto scheduleDto);
	
}
