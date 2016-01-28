//
//  BackgroundTaskManager.h
//  LocationToServer
//
//  Created by Semih Onay
//  Copyright (c) 2016 LocationToServer. All rights reserved.
//

#import <Foundation/Foundation.h>

@interface BackgroundTaskManager : NSObject

+(instancetype)sharedBackgroundTaskManager;

-(UIBackgroundTaskIdentifier)beginNewBackgroundTask;
-(void)endAllBackgroundTasks;

@end
